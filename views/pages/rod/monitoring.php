<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Ajax Script Accounts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body> 
 
<div class="container">
  <h2>Cards Columns</h2>
  <p>The .card-columns class creates a masonry-like grid of cards. The layout will automatically adjust as you insert more cards.</p>
  <p><strong>Note:</strong> The cards are displayed vertically on small screens (less than 576px):</p>
  <div class="card-columns">
    <div class="card bg-primary">
      <div class="card-body text-center">
        <p id="po_batanes_target" class="card-text">PO Batanes: <?= $po_batanes_target_o ?></p>
      </div>
    </div>
    <div class="card bg-warning">
      <div class="card-body text-center">
        <p class="card-text">PO Cagayan: <?= $po_cagayan_target_o ?></p>
      </div>
    </div>
    <div class="card bg-success">
      <div class="card-body text-center">
        <p class="card-text">PO Isabela: <?= $po_isabela_target_o ?></p>
      </div>
    </div>
    <div class="card bg-danger">
      <div class="card-body text-center">
        <p class="card-text">PO NV: <?= $po_nv_target_o ?></p>
      </div>
    </div>  
    <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text">PO Quirino: <?= $po_quirino_target_o ?></p>
      </div>
    </div>
    <div class="card bg-info">
      <div class="card-body text-center">
        <p class="card-text">Some text inside the sixth card</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>


   