
<?php
    session_start();
?>

<div class="flex flex-col items-start justify-start w-full h-full gap-6">
    <div class="flex flex-col items-start justify-start w-full h-auto gap-1">
        <h1 class="text-2xl font-bold text-zinc-800 tracking-wide">Payroll Request</h1>
        <p class="text-sm text-zinc-400 font-medium">Submit and manage your payroll claims</p>
    </div>
    <div class="flex flex-col items-center justify-start flex-1 w-full rounded-2xl bg-zinc-200 p-6 overflow-y-auto">
        <form action="" class="flex flex-col gap-4 w-200 h-auto min-h-full bg-white py-5 gap-5 rounded-xl border-2 border-zinc-300">
            <div class="flex flex-row items-center justify-between w-full h-auto gap-2 px-7">
                <div class="flex flex-row items-center justify-start w-auto h-auto gap-3">
                    <div class="flex items-center justify-center w-10 h-10 bg-green-500/10 border border-green-300 rounded-lg">
                        <i class="fa-solid fa-file-lines text-green-400 text-lg"></i>
                    </div>
                    <div class="flex flex-col items-start justify-between w-auto h-full">
                        <h2 class="text-md font-medium text-zinc-800 whitespace-nowrap">Payroll Request Form</h2>
                        <p class="text-xs text-zinc-400 font-medium">Complete all required fields before submitting</p>
                    </div>
                </div>
                <div class="flex flex-row items-start justify-end h-full w-auto">
                    <p class="text-xs text-zinc-400 font-medium">Fields marked <span class="text-red-500">*</span> are required</p>
                </div>
            </div>
            <hr class="w-full border-zinc-300" />
            <div class="flex flex-col items-start justify-start w-full h-auto px-7 gap-3">
                <div class="flex flex-row items-center justify-start w-full h-auto gap-2">
                    <p class="text-xs font-bold text-zinc-500 tracking-wide">EMPLOYEE INFORMATION</p>
                    <div class="flex flex-row items-center justify-center flex-1 border border-zinc-300 rounded-full h-auto"></div>
                </div>
                <div class="grid grid-cols-2 grid-rows-2 w-full h-auto gap-4">
                    <div class="flex flex-col items-center justify-start w-full h-auto">
                        <div class="flex flex-row items-center justify-start w-full h-auto gap-1">
                            <h2 class="text-xs font-bold text-zinc-400 tracking-wide">Full Name</h2>
                            <i class="fa-solid fa-lock text-xs text-zinc-400"></i>
                        </div>
                        
                    </div>
                    <div class="flex flex-col items-center justify-start w-full h-auto"></div>
                    <div class="flex flex-col items-center justify-start w-full h-auto"></div>
                    <div class="flex flex-col items-center justify-start w-full h-auto"></div>
                </div>
            </div>
        </form>
    </div>
</div>
