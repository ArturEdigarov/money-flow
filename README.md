# GAROV: money-flow

💸 GAROV: Money Flow — Personal Finance Manager

**GAROV** is a web application for tracking income and expenses with personalized transactions, data visualization, and PWA support. Each user sees only their own data, and the interface is optimized for mobile devices and desktop.

Money Flow allows users to manage income and expenses, create personalized transactions, view transaction history, and analyze data using charts. PWA support ensures the app works without installation on smartphones, tablets, or computers.

⚙️ Technologies

- **Frontend**: HTML, CSS, JavaScript  
- **Backend**: PHP  
- **Database**: MySQL  
- **Hosting**: InfinityFree (online), MAMP (local)  
- **Libraries**: Readbeams (database management), myChart (chart visualization)



 
## 🌐 Online Demo

You can try the live version of Money Flow here: [https://artur-yediharov.great-site.net/](https://artur-yediharov.great-site.net/)






📁 Project Structure

```bash money-flow/
├── css/                # Styles
├── img/                # Images
├── script/             # Scripts
├── templates/          # Templates
├── .vscode/            # Editor configuration
├── .htaccess           # Server configuration
├── autho.php           # Authorization
├── config.php          # Database connection settings
├── db.php              # Database functions
├── history.php         # Transaction history
├── index.php           # Main page
├── manifest.json       # PWA manifest
├── payments.php        # Payments page
├── reg.php             # Registration
├── sign-in.php         # Sign-in
└── sign-log.php        # Login logging
```

🗄️ Database

Database structure:
  users — stores user information.
  transactions — stores income and expense transactions.

  
📱 PWA Support on iOS (Apple)

On iOS/iPadOS, PWA works slightly differently:

- Open the app in **Safari** and select **"Add to Home Screen"** to install.  
- Runs in fullscreen mode like a native app, but **push notifications are not supported**.  
- Offline caching works, but storage is limited and apps may be cleared by the system.

  
📱 PWA Support(Android)

The app supports PWA, with installation on devices. To activate PWA, make sure manifest.json is configured and a service worker is set up for caching resources.

