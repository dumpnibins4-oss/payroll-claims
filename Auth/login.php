<?php


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="../Styles/style.css" />
        <title>Payroll Claims | Login</title>
    </head>
    <body>
        <div class="flex flex-col items-center justify-center w-screen h-screen bg-stone-200">
            <h1 class="fixed top-3 left-3 text-4xl font-extrabold text-pink-400 tracking-wide">LA ROSE NOIRE</h1>
            <div class="flex flex-col items-center justify-start p-8 w-100 bg-white rounded-4xl shadow-lg shadow-black/20">
                <!-- Logo & Title -->
                <div class="flex flex-col w-full h-auto items-center justify-center gap-2 mb-8">
                    <div class="coin-wrapper">
                        <div class="coin-spin flex w-14 h-14 items-center justify-center rounded-full bg-gradient-to-br from-zinc-200 via-zinc-400 to-zinc-300 shadow-none border-3 border-zinc-400">
                            <i class="fa-solid fa-peso-sign text-2xl bg-gradient-to-br from-pink-400 to-pink-600 bg-clip-text text-transparent"></i>
                        </div>
                        <div class="coin-shadow"></div>
                    </div>
                    <div class="flex flex-col items-center justify-center w-full h-auto">
                        <h2 class="text-2xl font-extrabold bg-gradient-to-br from-pink-400 to-pink-600 bg-clip-text text-transparent">Payroll Claims System</h2>
                        <h5 class="text-sm text-zinc-400 font-medium">Please sign in to continue</h5>
                    </div>
                </div>

                <!-- Form -->
                <form action="" method="POST" onsubmit="onSubmitForm(event)" class="flex flex-col w-full gap-4">

                    <!-- Username -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-zinc-400 uppercase tracking-widest">Username</label>
                        <div class="flex items-center bg-stone-100 border border-zinc-200 rounded-xl px-4 gap-3 focus-within:border-pink-300 transition-colors duration-200">
                            <i class="fa-solid fa-user text-zinc-500 text-sm"></i>
                            <input
                                type="text"
                                name="username"
                                placeholder="Enter your username"
                                class="bg-transparent w-full py-3 text-sm text-zinc-600 font-medium placeholder-zinc-500 outline-none"
                            />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-zinc-400 uppercase tracking-widest">Password</label>
                        <div class="flex items-center bg-stone-100 border border-zinc-200 rounded-xl px-4 gap-3 focus-within:border-pink-300 transition-colors duration-200">
                            <div class="flex flex-row items-center justify-start h-auto flex-1 gap-3">
                                <i class="fa-solid fa-lock text-zinc-500 text-sm"></i>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="Enter your password"
                                    class="bg-transparent w-full py-3 text-sm text-zinc-600 font-medium placeholder-zinc-500 outline-none"
                                />
                            </div>
                            <button
                                id="togglePasswordBtn"
                                type="button"
                                onclick="togglePassword()"
                                class="flex items-center justify-center w-auto h-auto bg-transparent cursor-pointer hover:invert-80 transition-all duration-200"
                            >
                                <i class="fa-solid fa-eye text-zinc-500 text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button
                        id="submit-button"
                        type="submit"
                        class="mt-4 w-full py-3 rounded-xl bg-gradient-to-br from-pink-300 to-pink-500 text-white font-bold text-md tracking-wide hover:translate-y-[-3px] hover:scale-101 hover:shadow-lg active:translate-y-[3px] active:scale-98 transition-all duration-200 shadow-md shadow-black/30 cursor-pointer flex items-center justify-center gap-2"
                    >
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span id="submit-label">Sign In</span>
                    </button>
                </form>
                <!-- Footer -->
                <p class="mt-6 text-xs text-zinc-500">&copy; <?= date('Y') ?> Payroll Claims System. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>

<script>
    const togglePassword = () => {
        const passwordInput = document.getElementById('password');
        const toggleBtn = document.getElementById('togglePasswordBtn');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleBtn.innerHTML = '<i class="fa-solid fa-eye-slash text-zinc-500 text-sm"></i>';
        } else {
            passwordInput.type = "password";
            toggleBtn.innerHTML = '<i class="fa-solid fa-eye text-zinc-500 text-sm"></i>';
        }
    }

    // Set Loading State
    const setLoading = (loading) => {
        const submitBtn = document.getElementById('submit-button')
        const submitLabel = document.getElementById('submit-label')
        
        if (loading) {
            submitBtn.disabled = true
            submitBtn.classList.add('opacity-80', 'cursor-not-allowed')
            submitBtn.classList.remove('hover:translate-y-[-3px]', 'hover:scale-101')
            submitBtn.innerHTML = `
                <svg class="animate-spin w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
                <span>Authenticating...</span>
            `
        } else {
            submitBtn.disabled = false
            submitBtn.classList.remove('opacity-80', 'cursor-not-allowed')
            submitBtn.classList.add('hover:translate-y-[-3px]', 'hover:scale-101')
            submitBtn.innerHTML = `
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Sign In</span>
            `
        }
    }

    // Form Submission
    const onSubmitForm = async(e) => {
        e.preventDefault()
        setLoading(true)
        
        const formData = new FormData(e.target)

        try {
            const response = await fetch("../API/login-api.php", {
                method: 'POST',
                body: formData,
            })

            const data = await response.json()
            if (data.success) {
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire({
                    icon: "success",
                    title: "Signed in successfully"
                }).then(() => {
                    setLoading(false)
                    window.location.href = "../index.php"
                })
            } else {
                Swal.fire({
                    title: "Error",
                    text: data.message,
                    icon: "error"
                })
                setLoading(false)
            }
        } catch (err) {
            Swal.fire({
                title: "Error",
                text: err.message,
                icon: "error"
            })
            setLoading(false)
        }
    }
</script>