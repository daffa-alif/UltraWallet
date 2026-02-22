# UltraWallet — Web3 Multi-Asset Platform

## Requirements

- PHP 8.0+
- XAMPP (or any Apache/Nginx server with PHP)
- MongoDB PHP PECL extension (`ext-mongodb`)
- MongoDB Atlas account (free tier works)

**NO Composer needed.** The project uses PHP's native MongoDB PECL driver only.

---

## Setup (XAMPP on Windows)

### Step 1 — Enable MongoDB PHP Extension

1. Check your PHP version:
   ```
   C:\xampp\php\php.exe --version
   ```

2. Download the matching `.dll` from:
   https://pecl.php.net/package/mongodb
   (Choose Thread Safe / NTS based on your PHP build)

3. Copy the `.dll` file to:
   ```
   C:\xampp\php\ext\php_mongodb.dll
   ```

4. Open `C:\xampp\php\php.ini` and add:
   ```
   extension=mongodb
   ```

5. Restart XAMPP Apache from the Control Panel.

### Step 2 — Configure MongoDB Atlas

Edit `.env` and update `MONGO_URI` with your Atlas connection string:

1. Go to https://cloud.mongodb.com
2. Click your cluster → Connect → Drivers
3. Copy the connection string, replace `<password>` with `DbUserPassword0101`
4. Paste it as `MONGO_URI` in `.env`

### Step 3 — Run the project

Place the `ultrawallet/` folder inside `C:\xampp\htdocs\` or run:
```
cd C:\projects\ultrawallet
php -S localhost:8000
```

Then open: http://localhost:8000

---

## File Structure

```
ultrawallet/
├── .env                    ← MongoDB credentials
├── index.php               ← Landing page
├── dashboard.php           ← Portfolio dashboard
├── assets.php              ← Asset marketplace
├── wallet.php              ← Wallet connections (25+ vendors)
├── portfolio.php           ← Transaction history
├── login.php               ← Authentication
├── register.php            ← Registration
├── logout.php              ← Logout
├── config/
│   ├── env.php             ← Pure PHP .env loader (no Composer)
│   ├── database.php        ← MongoDB PECL driver wrapper
│   └── session.php         ← Session helpers
└── includes/
    ├── header.php          ← Nav + Tailwind CSS CDN
    └── footer.php          ← Footer
```

## Why No Composer?

The MongoDB PECL extension (`ext-mongodb`) provides `MongoDB\Driver\Manager`, 
`MongoDB\Driver\Query`, and `MongoDB\Driver\BulkWrite` natively.
The higher-level `mongodb/mongodb` Composer package is just a convenience 
wrapper — we implement the same queries directly.
