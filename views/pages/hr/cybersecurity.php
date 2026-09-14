        <div class="tip-container no-margin-bottom mt-5">
            <div id="dailyTip" class="info-box">
                <h2>Cyber Hygiene Tip of the Day</h2>
                <p id="tipText">Loading...</p>
            </div>
          </div>
    <style>
        .tip-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50;
        }

        .info-box {
            max-width: 500px;
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
            animation: fadeIn 1.5s ease-in-out;
        }

        .info-box h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .info-box p {
            font-size: 18px;
            font-weight: 500;
        }

        .info-box::before {
            content: "🛡️";
            font-size: 35px;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            border-radius: 50%;
            padding: 5px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
    <script>
      $(document).ready(function () {
          // Cyber Hygiene Tips (Sample - Expand to 365)
          const cyberTips = [
                // Password Security
                "Use a strong, unique password for each account.",
                "Enable multi-factor authentication (MFA) on all accounts.",
                "Avoid reusing passwords across multiple sites.",
                "Update your passwords every three to six months.",
                "Check if any of your passwords have been exposed in data breaches.",
                "Use a password manager to securely store your passwords.",
                "Never share your passwords with anyone, even friends or family.",
                "Avoid writing down passwords on sticky notes or paper.",
                "Use passphrases instead of single-word passwords for extra security.",
                "Make sure your passwords are at least 12-16 characters long.",
                "Use a mix of uppercase, lowercase, numbers, and special characters in passwords.",
                "Enable biometric authentication (fingerprint, facial recognition) where possible.",
                "Disable saved passwords in your web browser and use a password manager instead.",
                "Regularly review your saved passwords and update weak ones.",
                "Don't use dictionary words or easily guessable phrases as passwords.",
                "If you suspect a password has been compromised, change it immediately.",
                
                // Device Security
                "Set your operating system to update automatically.",
                "Update your apps and software regularly to patch security holes.",
                "Always install security updates as soon as they’re available.",
                "Delete unused or outdated software from your devices.",
                "Ensure your antivirus software is always up-to-date.",
                "Enable firewall protection on your computer and network.",
                "Disable Bluetooth when not in use to prevent unauthorized connections.",
                "Use full-disk encryption to protect your data from theft.",
                "Install only trusted applications from verified sources.",
                "Turn off your devices when not in use to reduce attack surfaces.",
                "Disable automatic connections to unknown Wi-Fi networks.",
                "Regularly scan your computer for malware and viruses.",
                "Use device tracking software to locate lost or stolen devices.",
                "Enable remote wipe functionality on your phone and laptop.",
                "Be cautious of using USB drives from unknown sources.",
                "Secure your home Wi-Fi with a strong WPA3 password.",
                "Change your router’s default admin password immediately after setup.",
                "Turn off remote access features on your router if not needed.",
                "Regularly reboot your router to clear potential malware.",
                "Use a separate guest network for visitors at home.",
                
                // Online Safety
                "Don’t click on suspicious email links or attachments.",
                "Check email sender addresses carefully for signs of phishing.",
                "Never provide sensitive information in response to unsolicited emails.",
                "Be cautious when receiving emails with unexpected attachments.",
                "Be wary of 'urgent' emails asking you to act quickly.",
                "Look for 'https://' and a padlock icon before entering login credentials.",
                "Use private browsing mode when accessing sensitive websites.",
                "Clear your browsing history and cookies regularly.",
                "Disable third-party cookies for better privacy.",
                "Use a VPN when accessing the internet on public Wi-Fi.",
                "Avoid using public Wi-Fi for banking or sensitive transactions.",
                "Always log out of accounts after using public computers.",
                "Be cautious of shortened URLs – use a URL expander before clicking.",
                "Block pop-ups to reduce exposure to malicious ads.",
                "Use browser extensions that enhance security, like HTTPS Everywhere.",
                
                // Social Media Security
                "Limit the amount of personal information you share on social media.",
                "Set your social media profiles to private.",
                "Think before sharing location data on social media posts.",
                "Avoid posting photos that reveal sensitive information.",
                "Don't accept friend requests from unknown people.",
                "Review app permissions before linking them to your social media accounts.",
                "Avoid using social media login credentials for third-party websites.",
                "Turn off location tracking on social media apps.",
                "Regularly review privacy settings on your social media accounts.",
                "Be cautious of online quizzes that ask for personal details.",
                
                // Email & Phishing Security
                "Verify email requests for sensitive information by calling the sender directly.",
                "Don’t open attachments from unknown sources.",
                "Hover over links in emails to check their destination before clicking.",
                "Report phishing emails to your IT department or email provider.",
                "Use a separate email address for newsletters and online accounts.",
                "Be careful of emails that claim you've won a prize or lottery.",
                "Don’t reply to spam emails—this confirms your email is active.",
                "Enable spam filtering in your email settings.",
                "Regularly delete old emails that contain sensitive information.",
                
                // Backup & Data Protection
                "Backup your data regularly to an external drive or cloud storage.",
                "Use encrypted cloud storage services for sensitive files.",
                "Schedule automatic backups for important documents.",
                "Keep multiple copies of your backups in different locations.",
                "Test your backups regularly to ensure data integrity.",
                "Use end-to-end encrypted messaging apps for private conversations.",
                
                // Mobile Security
                "Lock your phone with a strong PIN, password, or biometric authentication.",
                "Encrypt your device’s storage to protect sensitive data.",
                "Use anti-theft features to remotely wipe your device if it’s lost.",
                "Ensure your mobile apps are from trusted sources.",
                "Turn off location services when not needed.",
                "Uninstall apps that you no longer use.",
                "Disable app permissions that aren’t necessary for functionality.",
                "Avoid downloading apps from third-party stores.",
                "Regularly clear app caches and permissions.",
                
                // Cybersecurity Awareness
                "Stay updated on the latest cyber threats and scams.",
                "Attend cybersecurity awareness training if available.",
                "Educate family members about online scams and phishing attempts.",
                "Set up alerts for suspicious activities on your accounts.",
                "Enable account activity notifications for banking apps.",
                "Regularly check your credit report for unauthorized accounts.",
                "Use temporary email addresses when signing up for unknown websites.",
                "If an online service offers security alerts, enable them.",
                
                // Workplace Cyber Hygiene
                "Lock your workstation when stepping away from your desk.",
                "Use company-approved software and avoid unauthorized applications.",
                "Never plug unknown USB drives into your work computer.",
                "Use separate passwords for personal and work accounts.",
                "Report any suspicious IT activity to your security team immediately.",
                "Avoid discussing confidential work matters in public places.",
                "Use company-provided VPNs when working remotely.",
                "Keep your work devices separate from personal devices.",
                
                // Miscellaneous Tips
                "Regularly check for updates on your devices to fix vulnerabilities.",
                "Review your digital footprint and remove old accounts you no longer use.",
                "Turn off smart home devices when not in use.",
                "Be cautious of AI-generated scams or deepfakes online.",
                "Disable voice assistant features when not needed.",
                "Monitor your smart devices for unusual activity.",
                "Shred sensitive documents before disposing of them.",
                "Set up an emergency contact for digital access in case of incidents.",
                "Enable 'do not track' features in your web browser.",
                "Use disposable credit cards for online purchases where possible.",
                "Review and update your security questions periodically.",
                "Consider using a dedicated device for banking and financial transactions."
            ];


          // Get current month and day
          const now = new Date();
          const month = now.getMonth(); // 0 = Jan, 11 = Dec
          const day = now.getDate() - 1; // Adjust to zero-based index

          // Generate a unique tip index based on month and day
          const index = (month * 31 + day) % cyberTips.length;

          // Display the tip in the HTML element
          $("#tipText").html(cyberTips[index]);
      });
    </script>