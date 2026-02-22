# UltraWallet — Web3 Multi-Asset Platform

A full-stack PHP + MongoDB Web3 platform for owning real-world assets: cryptocurrency, gold, stocks, and real estate.

## Project Structure

```
ultrawallet/
├── .env                    # Environment variables (MongoDB credentials)
├── .htaccess               # Apache config
├── composer.json           # PHP dependencies
├── index.php               # Landing page
├── dashboard.php           # User dashboard
├── assets.php              # Asset marketplace
├── wallet.php              # Wallet connections (25+ vendors)
├── portfolio.php           # User portfolio & transactions
├── login.php               # Authentication
├── register.php            # Registration
├── logout.php              # Logout
├── config/
│   ├── database.php        # MongoDB connection class
│   └── session.php         # Session helpers
└── includes/
    ├── header.php          # Nav, styles, ticker
    └── footer.php          # Footer
```

## Setup Instructions

### 1. Requirements
- PHP 8.0+
- MongoDB PHP Extension: `pecl install mongodb`
- Composer
- MongoDB Atlas account (or local MongoDB 6+)

### 2. Install Dependencies
```bash
composer install
```

### 3. Configure MongoDB

Edit `.env` with your MongoDB Atlas connection:
```
MONGO_URI=mongodb+srv://daffa:DbUserPassword0101@cluster0.mongodb.net/?retryWrites=true&w=majority
MONGO_DB=ultrawallet
```

> **Note:** Replace `cluster0` with your actual MongoDB Atlas cluster name.
> You can find it in your Atlas dashboard under "Connect" > "Connect your application"

### 4. Enable PHP MongoDB Extension

Add to `php.ini`:
```
extension=mongodb
```

### 5. Collections Created Automatically
- `users` — User accounts
- `portfolios` — Asset holdings  
- `transactions` — Buy/sell history
- `wallets` — Connected wallet addresses

### 6. Run Locally
```bash
php -S localhost:8000
```
Then open: http://localhost:8000

## Features

- **Web3 Wallet Integration** — MetaMask, Phantom, Ledger, Trust Wallet, Rainbow, and 20+ more
- **Multi-Asset Ownership** — Crypto, Gold/Metals, Global Stocks, Tokenized Real Estate
- **Live Price Ticker** — Real-time price updates in header
- **User Authentication** — Register/Login with MongoDB storage
- **Portfolio Dashboard** — Holdings overview with P&L tracking
- **Asset Marketplace** — Browse and buy fractional assets
- **Transaction History** — Full audit trail of all operations
- **KYC System** — Identity verification flow (ready to integrate)

## Styling

- **TailwindCSS CDN** — via `https://cdn.tailwindcss.com`
- **Google Fonts** — Syne (display), Space Mono (mono), DM Sans (body)
- **Design** — Dark Web3 aesthetic with cyan/violet/gold accents, grid background, ambient glows

## Security

- Passwords hashed with `password_hash()` (bcrypt)
- `.env` file blocked via `.htaccess`
- Session with `httponly` and `SameSite=Strict` cookies
- Non-custodial wallet connection (read-only by default)
- Input sanitization with `htmlspecialchars()`

## Extending

To add real-time prices, integrate:
- CoinGecko API for crypto prices
- Metals-API for gold/silver
- Alpha Vantage for stocks

For production wallet signing, integrate:
- `web3.php` library for EVM
- Solana PHP SDK for SOL wallets
