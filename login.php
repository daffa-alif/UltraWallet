<?php
// login.php
$pageTitle = 'Sign In — UltraWallet';
require_once __DIR__ . '/config/session.php';

if (isLoggedIn()) {
    header('Location: /dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/config/database.php';

    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        $error = 'Email and password are required.';
    } else {
        try {
            $users = Database::getCollection('users');
            $user  = $users->findOne(['email' => $email]);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = (string) $user['_id'];
                $_SESSION['user']    = [
                    'id'       => (string) $user['_id'],
                    'username' => $user['username'],
                    'email'    => $user['email'],
                ];
                header('Location: /dashboard.php');
                exit;
            } else {
                $error = 'Invalid email or password.';
            }
        } catch (Exception $e) {
            $error = 'Login failed. Please try again.';
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<div class="min-h-[80vh] flex items-center justify-center py-16 px-6">
    <div class="absolute top-1/3 right-1/3 w-80 h-80 bg-ultra-cyan/8 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/3 left-1/3 w-80 h-80 bg-ultra-gold/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md relative z-10">
        <div class="text-center mb-10">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-ultra-cyan to-ultra-violet flex items-center justify-center text-white font-bold font-display text-2xl mx-auto mb-4">U</div>
            <h1 class="font-display font-extrabold text-3xl">Welcome Back</h1>
            <p class="text-ultra-sub mt-2">Sign in to your UltraWallet</p>
        </div>

        <?php if ($error): ?>
        <div class="mb-6 px-4 py-3 rounded-xl border border-ultra-red/30 bg-ultra-red/10 text-ultra-red text-sm">
            ⚠ <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <form method="POST" class="bg-ultra-card border border-ultra-border rounded-2xl p-8 space-y-5">
            <div>
                <label class="block text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    class="w-full bg-ultra-surface border border-ultra-border rounded-xl px-4 py-3 text-sm text-ultra-text focus:outline-none focus:border-ultra-cyan transition-colors"
                    placeholder="you@email.com" required>
            </div>

            <div>
                <label class="block text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">Password</label>
                <input type="password" name="password"
                    class="w-full bg-ultra-surface border border-ultra-border rounded-xl px-4 py-3 text-sm text-ultra-text focus:outline-none focus:border-ultra-cyan transition-colors"
                    placeholder="••••••••" required>
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center gap-2 cursor-pointer text-ultra-sub">
                    <input type="checkbox" name="remember" class="accent-cyan-500">
                    Remember me
                </label>
                <a href="#" class="text-ultra-cyan hover:underline">Forgot password?</a>
            </div>

            <button type="submit" class="w-full py-4 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white font-display font-bold rounded-xl text-sm hover:opacity-90 transition-opacity">
                Sign In →
            </button>

            <!-- Divider -->
            <div class="flex items-center gap-3">
                <div class="flex-1 h-px bg-ultra-border"></div>
                <span class="text-xs text-ultra-sub font-mono">OR</span>
                <div class="flex-1 h-px bg-ultra-border"></div>
            </div>

            <!-- Wallet Sign In -->
            <button type="button" onclick="window.location='/wallet.php'"
                class="wallet-btn w-full py-3 border border-ultra-border rounded-xl text-sm font-medium text-ultra-sub hover:text-ultra-text hover:border-ultra-muted transition-colors flex items-center justify-center gap-2">
                🦊 Continue with Wallet
            </button>
        </form>

        <p class="text-center text-ultra-sub text-sm mt-6">
            Don't have an account? <a href="/register.php" class="text-ultra-cyan hover:underline">Create one</a>
        </p>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
