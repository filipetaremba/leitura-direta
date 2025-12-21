<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Glassmorphism</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .bg-custom-gradient {
            background: #f6f6f6ff;
        }
    </style>
</head>

<body class="bg-custom-gradient min-h-screen flex items-center justify-center">

    <div class="relative w-full max-w-sm p-10 mx-4 bg-white/20 backdrop-blur-lg border border-black shadow-2xl">

        <h2 class="text-2xl font-bold text-black mb-6 tracking-wider uppercase">
            Register
        </h2>

        <!-- ALERT -->
        <div id="alert" class="hidden mb-4 p-3 text-sm font-semibold"></div>

        <form id="registerForm" class="space-y-5">

            <!-- NOME -->
            <div class="relative">
                <input 
                    type="text"
                    name="name"
                    placeholder="Full name"
                    required
                    class="w-full px-4 py-3 bg-white text-black placeholder-black 
                           focus:outline-none focus:ring-2 focus:ring-black 
                           transition-all shadow-inner"
                />
            </div>

            <!-- EMAIL -->
            <div class="relative">
                <input 
                    type="email"
                    name="email"
                    placeholder="E-mail address"
                    required
                    class="w-full px-4 py-3 bg-white text-black placeholder-black 
                           focus:outline-none focus:ring-2 focus:ring-black 
                           transition-all shadow-inner"
                />
            </div>

            <!-- SENHA -->
            <div class="relative">
                <input 
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    class="w-full px-4 py-3 bg-white text-black placeholder-black 
                           focus:outline-none focus:ring-2 focus:ring-black 
                           transition-all shadow-inner"
                />
            </div>

            <button 
                type="submit"
                id="btnSubmit"
                class="w-full py-2 mt-2 bg-blue-600 hover:bg-blue-700 
                       text-black font-bold shadow-lg transition-all 
                       active:scale-[0.98] tracking-widest text-lg"
            >
                CRIAR
            </button>

            <p class="text-center text-xs text-black mt-6">
                Ja tens uma conta?
                <a href="<?= base_url('admin/login') ?>" 
                   class="underline font-bold hover:text-gray-800 transition-colors">
                    Entrar
                </a>
            </p>

        </form>
    </div>

    <script>
        const form = document.getElementById('registerForm');
        const alertBox = document.getElementById('alert');
        const btnSubmit = document.getElementById('btnSubmit');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            btnSubmit.disabled = true;
            btnSubmit.textContent = '⏳ Registering...';

            const formData = new FormData(form);

            try {
                const response = await fetch('<?= base_url('admin/register') ?>', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    alertBox.className = 'block mb-4 p-3 bg-green-200 text-green-900';
                    alertBox.textContent = '✅ ' + result.message;

                    form.reset();

                    setTimeout(() => {
                        window.location.href = '<?= base_url('admin/login') ?>';
                    }, 2000);

                } else {
                    alertBox.className = 'block mb-4 p-3 bg-red-200 text-red-900';

                    if (result.errors) {
                        let msg = '❌ ';
                        for (let field in result.errors) {
                            msg += result.errors[field] + ' ';
                        }
                        alertBox.textContent = msg;
                    } else {
                        alertBox.textContent = '❌ ' + result.message;
                    }

                    btnSubmit.disabled = false;
                    btnSubmit.textContent = 'SIGN UP';
                }

            } catch (error) {
                alertBox.className = 'block mb-4 p-3 bg-red-200 text-red-900';
                alertBox.textContent = '❌ Server connection error';
                btnSubmit.disabled = false;
                btnSubmit.textContent = 'SIGN UP';
            }
        });
    </script>

</body>
</html>
