<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Redirecting...</title>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#08090d;
    --panel:#0e1016;
    --line:rgba(255,255,255,0.08);
    --accent:#5eead4;
    --accent-dim:rgba(94,234,212,0.18);
    --text:#e8eaee;
    --muted:#5b6270;
  }

  *{margin:0;padding:0;box-sizing:border-box;}

  body{
    background:var(--bg);
    min-height:100vh;
    display:flex;align-items:center;justify-content:center;
    font-family:'Space Grotesk',sans-serif;
    color:var(--text);
    position:relative;
    overflow:hidden;
  }

  .grid{
    position:fixed;inset:0;
    background-image:
      linear-gradient(var(--line) 1px, transparent 1px),
      linear-gradient(90deg, var(--line) 1px, transparent 1px);
    background-size:64px 64px;
    -webkit-mask-image:radial-gradient(ellipse 70% 60% at 50% 40%, black 0%, transparent 75%);
            mask-image:radial-gradient(ellipse 70% 60% at 50% 40%, black 0%, transparent 75%);
    opacity:0.5;
  }

  .card{
    position:relative;z-index:2;
    width:380px;
    padding:2.5rem 2.25rem 2rem;
    background:var(--panel);
    border:1px solid var(--line);
    border-radius:14px;
    box-shadow:0 30px 80px rgba(0,0,0,0.55);
    text-align:center;
  }

  .ring{
    width:64px;height:64px;
    margin:0 auto 1.6rem;
    position:relative;
  }
  .ring svg{width:64px;height:64px;display:block;}
  .ring-track{fill:none;stroke:var(--line);stroke-width:2;}
  .ring-fill{
    fill:none;stroke:var(--accent);stroke-width:2;stroke-linecap:round;
    stroke-dasharray:175;stroke-dashoffset:175;
    transform-origin:50% 50%;transform:rotate(-90deg);
    animation:fillring 2.4s cubic-bezier(.65,0,.35,1) forwards;
  }
  @keyframes fillring{
    0%{stroke-dashoffset:175;}
    100%{stroke-dashoffset:0;}
  }
  .ring-icon{
    position:absolute;inset:0;
    display:flex;align-items:center;justify-content:center;
  }
  .ring-icon svg{width:20px;height:20px;}
  .spin{
    animation:spin 1s linear infinite;
    transform-origin:center;
  }
  .spin circle{
    stroke:var(--accent);
    stroke-dasharray:28 100;
  }
  @keyframes spin{to{transform:rotate(360deg);}}

  h1{
    font-size:1.05rem;
    font-weight:600;
    letter-spacing:-0.01em;
    margin-bottom:0.4rem;
  }
  .sub{
    font-family:'JetBrains Mono',monospace;
    font-size:0.72rem;
    color:var(--muted);
    letter-spacing:0.02em;
    margin-bottom:1.75rem;
  }

  .status{
    display:flex;align-items:center;gap:9px;
    padding:0.7rem 0.85rem;
    background:rgba(255,255,255,0.02);
    border:1px solid var(--line);
    border-radius:8px;
    margin-bottom:1.4rem;
    text-align:left;
  }
  .dot{
    width:6px;height:6px;border-radius:50%;
    background:var(--accent);flex-shrink:0;
    box-shadow:0 0 0 3px var(--accent-dim);
    animation:pulse 1.6s ease-in-out infinite;
  }
  @keyframes pulse{0%,100%{opacity:1;}50%{opacity:0.4;}}
  .status-text{
    font-family:'JetBrains Mono',monospace;
    font-size:0.74rem;
    color:var(--text);
    letter-spacing:0.01em;
  }
  .status-text .dim{color:var(--muted);}

  .bar-track{
    height:3px;border-radius:2px;
    background:var(--line);
    overflow:hidden;
    margin-bottom:0.55rem;
  }
  .bar-fill{
    height:100%;width:0%;
    background:var(--accent);
    border-radius:2px;
    animation:grow 2.4s cubic-bezier(.65,0,.35,1) forwards;
  }
  @keyframes grow{
    0%{width:0%;}
    100%{width:100%;}
  }
  .pct-row{
    display:flex;justify-content:space-between;
    font-family:'JetBrains Mono',monospace;
    font-size:0.62rem;
    color:var(--muted);
    letter-spacing:0.06em;
  }
  .pct-row .val{color:var(--accent);}

  body.done .card{
    opacity:0;
    transform:translateY(4px);
    transition:opacity .35s ease, transform .35s ease;
  }

  @media (prefers-reduced-motion: reduce){
    .ring-fill, .bar-fill, .spin, .dot{animation:none !important;}
    .ring-fill{stroke-dashoffset:0;}
    .bar-fill{width:100%;}
  }
</style>
</head>
<body>

<div class="grid"></div>

<div class="card">

  <div class="ring">
    <svg viewBox="0 0 64 64">
      <circle class="ring-track" cx="32" cy="32" r="28"/>
      <circle class="ring-fill"  cx="32" cy="32" r="28"/>
    </svg>
    <div class="ring-icon" id="ring-icon">
      <svg class="spin" viewBox="0 0 24 24" fill="none">
        <circle cx="12" cy="12" r="9" stroke-width="2"/>
      </svg>
    </div>
  </div>

  <h1>Signing you in</h1>
  <p class="sub">Verifying session and connecting to the portal</p>

  <div class="status">
    <span class="dot"></span>
    <span class="status-text" id="status-text">Establishing secure connection<span class="dim">&hellip;</span></span>
  </div>

  <div class="bar-track"><div class="bar-fill" id="bar"></div></div>
  <div class="pct-row">
    <span>Progress</span>
    <span class="val" id="pct">0%</span>
  </div>

</div>

<script>
  const pctEl = document.getElementById('pct');
  let start = null;
  function animPct(ts){
    if(!start) start = ts;
    const t = Math.min((ts - start) / 2400, 1);
    pctEl.textContent = Math.round(t * 100) + '%';
    if(t < 1) requestAnimationFrame(animPct);
  }
  requestAnimationFrame(animPct);

  function markDone(){
    document.getElementById('status-text').innerHTML = 'Connected — redirecting<span class="dim">&hellip;</span>';
    document.getElementById('ring-icon').innerHTML =
      '<svg viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#5eead4" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    pctEl.textContent = '100%';
    setTimeout(() => {
      document.body.classList.add('done');
      setTimeout(() => { window.location.href = url; }, 350);
    }, 450);
  }

  const token = "<?= htmlspecialchars($token, ENT_QUOTES, 'UTF-8') ?>";
  const url   = "https://proxy.tesdar02onlinereporting.ph/v2/auth/" + token;

  fetch(url, { method: 'HEAD', mode: 'no-cors' })
    .then(() => { markDone(); })
    .catch(() => { setTimeout(markDone, 1400); });
</script>

</body>
</html>