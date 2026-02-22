<?php
// register.php
$pageTitle = 'Create Account — UltraWallet';
require_once __DIR__ . '/config/session.php';

if (isLoggedIn()) {
    header('Location: /dashboard.php');
    exit;
}

$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/config/database.php';

    $username  = trim($_POST['username'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $password  = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    if (!$username || !$email || !$password) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address.';
    } elseif (strlen($password) < 8) {
        $error = 'Password must be at least 8 characters.';
    } elseif ($password !== $password2) {
        $error = 'Passwords do not match.';
    } else {
        try {
            $users = Database::getCollection('users');

            // Check existing
            $existing = $users->findOne(['$or' => [['email' => $email], ['username' => $username]]]);
            if ($existing) {
                $error = 'Username or email already in use.';
            } else {
                $users->insertOne([
                    'username'   => $username,
                    'email'      => $email,
                    'password'   => password_hash($password, PASSWORD_BCRYPT),
                    'created_at' => new MongoDB\BSON\UTCDateTime(),
                    'portfolio'  => [],
                    'wallets'    => [],
                    'kyc_status' => 'pending',
                ]);
                $success = 'Account created! You can now sign in.';
            }
        } catch (Exception $e) {
            $error = 'Registration failed: ' . $e->getMessage();
        }
    }
}
require_once __DIR__ . '/includes/header.php';
?>

<div class="min-h-[80vh] flex items-center justify-center py-16 px-6">
    <!-- ambient -->
    <div class="absolute top-1/3 left-1/3 w-80 h-80 bg-ultra-violet/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/3 right-1/3 w-80 h-80 bg-ultra-cyan/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md relative z-10">
        <div class="text-center mb-10">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-ultra-cyan to-ultra-violet flex items-center justify-center text-white font-bold font-display text-2xl mx-auto mb-4 animate-glow">U</div>
            <h1 class="font-display font-extrabold text-3xl">Create Account</h1>
            <p class="text-ultra-sub mt-2">Join 2M+ global asset owners</p>
        </div>

        <?php if ($error): ?>
        <div class="mb-6 px-4 py-3 rounded-xl border border-ultra-red/30 bg-ultra-red/10 text-ultra-red text-sm">
            ⚠ <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>
        <?php if ($success): ?>
        <div class="mb-6 px-4 py-3 rounded-xl border border-ultra-green/30 bg-ultra-green/10 text-ultra-green text-sm">
            ✓ <?= htmlspecialchars($success) ?>
            <a href="/login.php" class="underline ml-2">Sign in now →</a>
        </div>
        <?php endif; ?>

        <form method="POST" class="bg-ultra-card border border-ultra-border rounded-2xl p-8 space-y-5">
            <div>
                <label class="block text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">Username</label>
                <input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                    class="w-full bg-ultra-surface border border-ultra-border rounded-xl px-4 py-3 text-sm text-ultra-text focus:outline-none focus:border-ultra-cyan transition-colors font-mono"
                    placeholder="satoshi_nakamoto" required>
            </div>

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
                    placeholder="Min 8 characters" required>
            </div>

            <div>
                <label class="block text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">Confirm Password</label>
                <input type="password" name="password2"
                    class="w-full bg-ultra-surface border border-ultra-border rounded-xl px-4 py-3 text-sm text-ultra-text focus:outline-none focus:border-ultra-cyan transition-colors"
                    placeholder="Repeat password" required>
            </div>

            <label class="flex items-start gap-3 cursor-pointer">
                <input type="checkbox" class="mt-1 accent-cyan-500" required>
                <span class="text-xs text-ultra-sub leading-relaxed">I agree to the <a href="#" class="text-ultra-cyan hover:underline">Terms of Service</a> and <a href="#" class="text-ultra-cyan hover:underline">Privacy Policy</a>.</span>
            </label>

            <button type="submit" class="w-full py-4 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white font-display font-bold rounded-xl text-sm hover:opacity-90 transition-opacity mt-2">
                Create My Account →
            </button>
        </form>

        <p class="text-center text-ultra-sub text-sm mt-6">
            Already have an account? <a href="/login.php" class="text-ultra-cyan hover:underline">Sign in</a>
        </p>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
