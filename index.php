<?php
    session_start();
    if (!isset($_SESSION['user_role'])) {
        header("Location: ./Auth/login.php");
        exit;
    }

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
        <title>Payroll Claims | Request</title>
    </head>
    <body>
        <div class="flex flex-row items-start justify-start w-screen h-screen bg-zinc-100">
            <!-- Sidebar -->
            <div class="flex flex-col items-center justify-start w-80 h-full p-3">
                <div class="flex flex-col items-center justify-between w-full h-full bg-black rounded-4xl px-5 py-6 overflow-hidden">
                    <!-- Upper Sidebar -->
                    <div class="flex flex-col items-start justify-start w-full h-auto gap-5">
                        <h1 class="text-white text-xl font-bold tracking-wide">Payroll Claims</h1>
                        <button onclick="toggleProfileExp()" class="flex flex-col items-start justify-start w-full h-auto py-2 px-4 rounded-2xl bg-zinc-800 hover:bg-zinc-800/90 cursor-pointer active:scale-95 transition-all duration-200">
                            <div class="flex flex-row items-start justify-between w-full h-auto">
                                <div class="flex flex-row items-center justify-start h-auto w-auto gap-2">
                                    <div class="h-7 border border-green-400 rounded-full"></div>
                                    <img draggable="false" src="http://10.2.0.8/lrnph/emp_photos/<?= $_SESSION['user_information']['EmployeeID'] ?>.jpg" alt="" class="w-13 h-13 object-cover object-top rounded-full">
                                    <h2 class="text-white text-sm font-medium tracking-wide"><?= $_SESSION['user_information']['FirstName'] ?></h2>
                                </div>
                                <div class="h-full w-auto flex flex-row items-center justify-center">
                                    <i id="profile-switcher" class="fa-solid fa-angle-down text-white text-sm transition-transform duration-300"></i>
                                </div>
                            </div>
                            <div id="expanded-profile-content" class="grid grid-rows-[0fr] opacity-0 transition-all duration-300 ease-in-out w-full">
                                <div class="overflow-hidden flex flex-col items-start justify-start w-full gap-3">
                                    <hr class="w-full border border-zinc-700/70 rounded-full mt-3">
                                    <div class="flex flex-col items-start justify-start w-full h-auto gap-2">
                                        <div class="flex flex-col items-start justify-center w-full h-auto">
                                            <h2 class="text-xs text-zinc-400 font-medium">Name</h2>
                                            <h5 class="text-xs text-white font-medium tracking-wide"><?= $_SESSION['user_information']['FirstName'] . ' ' . substr($_SESSION['user_information']['MiddleName'], 0, 1) . '. ' . $_SESSION['user_information']['LastName'] ?></h5>
                                        </div>
                                        <div class="flex flex-col items-start justify-center w-full h-auto">
                                            <h2 class="text-xs text-zinc-400 font-medium">Employee ID</h2>
                                            <h5 class="text-xs text-white font-medium tracking-wide"><?= $_SESSION['user_information']['EmployeeID'] ?></h5>
                                        </div>
                                        <div class="flex flex-col items-start justify-center w-full h-auto">
                                            <h2 class="text-xs text-zinc-400 font-medium">Department</h2>
                                            <h5 class="text-xs text-white font-medium tracking-wide text-left"><?= $_SESSION['user_information']['Department'] ?></h5>
                                        </div>
                                        <div class="flex flex-col items-start justify-center w-full h-auto">
                                            <h2 class="text-xs text-zinc-400 font-medium">Job Level</h2>
                                            <h5 class="text-xs text-white font-medium tracking-wide text-left"><?= $_SESSION['user_information']['JobLevel'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>

                        <div class="flex flex-row items-center justify-start w-full h-auto gap-2">
                            <p class="text-sm text-zinc-400 font-medium tracking-wide"><span class="font-bold text-white">#</span> Navigation</p>
                            <div class="border border-zinc-400 h-0 flex-1 rounded-full"></div>
                        </div>

                        <!-- Sidebar Navigation -->
                        <div id="nav-buttons" class="flex flex-col items-center justify-start w-full h-auto gap-3">
                            <button onclick="navigateTo('payroll-request')" data-page="payroll-request" class="nav-btn active flex flex-row items-center justify-start w-full h-12 px-4 rounded-2xl bg-green-500 cursor-pointer active:scale-95 transition-all duration-200 gap-3">
                                <i class="fa-solid fa-file-lines text-sm text-zinc-800"></i>
                                <span class="text-zinc-800 text-sm font-medium tracking-wide">Payroll Request</span>
                            </button>
                            <button onclick="navigateTo('request-history')" data-page="request-history" class="nav-btn flex flex-row items-center justify-start w-full h-12 px-4 rounded-2xl hover:bg-zinc-800/90 cursor-pointer active:scale-95 transition-all duration-200 gap-3">
                                <i class="fa-solid fa-clock-rotate-left text-white text-sm"></i>
                                <span class="text-white text-sm font-medium tracking-wide">Request History</span>
                            </button>
                        </div>
                        <hr class="w-full border border-zinc-700" />
                        <button onclick="handleSignOut()" class="flex flex-row items-center justify-center w-full h-10 gap-2 rounded-xl border border-zinc-700 hover:border-red-500 hover:bg-red-500/10 transition-all duration-200 cursor-pointer active:scale-95 group">
                            <i class="fa-solid fa-arrow-right-from-bracket text-sm text-zinc-400 group-hover:text-red-400 transition-colors duration-200"></i>
                            <span class="text-sm font-medium tracking-wide text-zinc-400 group-hover:text-red-400 transition-colors duration-200">Sign Out</span>
                        </button>
                    </div>
                    <!-- Lower Sidebar -->
                    <div class="flex flex-col items-center justify-end w-full h-auto">
                        <img draggable="false" src="./Assets/logo/logo.png" alt="" class="w-1/2 h-auto object-cover invert-70">
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div id="main-content" class="flex flex-col h-full flex-1 overflow-y-auto p-3"></div>
        </div>
    </body>
</html>

<script>
    // Toggle Profile Expansion
    const toggleProfileExp = () => {
        const content = document.getElementById('expanded-profile-content')
        const switcher = document.getElementById('profile-switcher')
        if (content.classList.contains('grid-rows-[0fr]')) {
            content.classList.remove('grid-rows-[0fr]', 'opacity-0')
            content.classList.add('grid-rows-[1fr]', 'opacity-100')
            switcher.classList.add('rotate-180')
        } else {
            content.classList.remove('grid-rows-[1fr]', 'opacity-100')
            content.classList.add('grid-rows-[0fr]', 'opacity-0')
            switcher.classList.remove('rotate-180')
        }
    }

    // Navigation
    const navigateTo = async (page) => {
        const mainContent = document.getElementById('main-content')
        const navBtns = document.querySelectorAll('.nav-btn')

        // Update active state on buttons
        navBtns.forEach(btn => {
            const isActive = btn.getAttribute('data-page') === page
            if (isActive) {
                btn.classList.add('bg-green-500')
                btn.classList.remove('hover:bg-zinc-800/90')
                btn.querySelectorAll('i, span').forEach(el => {
                    el.classList.remove('text-white')
                    el.classList.add('text-zinc-800')
                })
            } else {
                btn.classList.remove('bg-green-500')
                btn.classList.add('hover:bg-zinc-800/90')
                btn.querySelectorAll('i, span').forEach(el => {
                    el.classList.remove('text-zinc-800')
                    el.classList.add('text-white')
                })
            }
        })

        // Load page content via fetch
        try {
            const response = await fetch(`./Pages/${page}.php`)
            if (response.ok) {
                mainContent.innerHTML = await response.text()
            } else {
                mainContent.innerHTML = `<div class="flex items-center justify-center h-full w-full"><p class="text-zinc-400">Page not found.</p></div>`
            }
        } catch (err) {
            mainContent.innerHTML = `<div class="flex items-center justify-center h-full w-full"><p class="text-red-400">Error loading page.</p></div>`
        }

        // Persist current page
        sessionStorage.setItem('currentPage', page)
    }

    // Load saved page or default on startup
    const savedPage = sessionStorage.getItem('currentPage') || 'payroll-request'
    navigateTo(savedPage)

    // Handle Sign-Out
    const handleSignOut = () => {
        Swal.fire({
            title: "Signing Out...",
            text: "Are you sure you want to sign out?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Sign Out!"
        }).then((result) => {
            if (result.isConfirmed) {
                sessionStorage.removeItem('currentPage')
                window.location.href = "./Auth/logout.php"
            }
        })
    }
</script>