
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPDO Venue Reservation System</title>

    @vite(['resources/css/app.css', 'resources/js/app.tsx'])
</head>

<body class="min-h-screen bg-slate-100 font-sans text-slate-900">

<div class="flex min-h-screen flex-col">

    <main class="grid flex-1 lg:grid-cols-[0.9fr_1.1fr]">

        <!-- LEFT: Welcome and Login -->
        <section
            class="relative flex items-center justify-center overflow-hidden
                   bg-gradient-to-br from-blue-950 via-blue-900 to-slate-900
                   px-6 py-12 text-white md:px-12">

            <!-- Decorative background -->
            <div class="absolute -left-24 -top-24 h-80 w-80 rounded-full
                        bg-blue-500/10 blur-3xl"></div>
            <div class="absolute -bottom-24 -right-12 h-80 w-80 rounded-full
                        bg-cyan-400/10 blur-3xl"></div>

            <div class="relative w-full max-w-lg rounded-2xl border
                        border-white/15 bg-slate-950/40 p-8 text-center
                        shadow-2xl backdrop-blur-sm sm:p-12">

                <!-- CPDO Logo Placeholder -->
                <div class="mx-auto flex h-20 w-20 items-center justify-center
                            rounded-full border-2 border-blue-200/70
                            bg-white text-2xl font-black text-blue-950">
                    C
                </div>

                <p class="mt-6 text-sm font-semibold uppercase tracking-[0.3em]
                          text-blue-200">
                    Welcome to
                </p>

                <h1 class="mt-3 text-3xl font-extrabold leading-tight sm:text-4xl">
                    CPDO Venue
                    <span class="block text-blue-300">
                        Reservation System
                    </span>
                </h1>

                <div class="mx-auto mt-6 h-1 w-16 rounded-full bg-red-500"></div>

                <p class="mt-6 leading-7 text-slate-300">
                    Plan your event. Reserve your venue.
                    Manage your reservation requests in one convenient place.
                </p>

                <a href="{{ route('login') }}"
                   class="mt-8 flex w-full items-center justify-center gap-3
                          rounded-lg bg-white px-5 py-4 font-bold
                          text-blue-950 shadow-lg transition
                          hover:bg-blue-50 focus:outline-none
                          focus:ring-4 focus:ring-blue-300/50">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" aria-hidden="true">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                        <polyline points="10 17 15 12 10 7"/>
                        <line x1="15" y1="12" x2="3" y2="12"/>
                    </svg>

                    Sign in to your account
                </a>

                <p class="mt-5 text-xs text-slate-400">
                    Secure access for students and authorized personnel.
                </p>
            </div>
        </section>

        <!-- RIGHT: Venue Information -->
        <section class="flex items-center bg-slate-50 px-6 py-12
                        sm:px-10 lg:px-12 xl:px-16">

            <div class="mx-auto w-full max-w-3xl">

                <div class="border-b border-slate-200 pb-6">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-2 shrink-0 rounded-full
                                    bg-red-700"></div>

                        <div>
                            <h2 class="text-3xl font-extrabold uppercase
                                       tracking-wide text-blue-950
                                       sm:text-4xl">
                                Venue Updates
                            </h2>
                            <p class="mt-2 text-sm text-slate-600 sm:text-base">
                                Important information for your venue reservation.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-7 space-y-4">

                    <!-- Update 1 -->
                    <article class="flex items-center gap-4 rounded-xl
                                    border border-slate-200 bg-white p-4
                                    shadow-sm transition hover:shadow-md sm:p-5">

                        <div class="flex h-14 w-14 shrink-0 items-center
                                    justify-center rounded-lg bg-blue-100
                                    text-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-7 w-7" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round"
                                 stroke-linejoin="round" aria-hidden="true">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <path d="M14 2v6h6M8 13h8M8 17h8"/>
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-bold uppercase tracking-wide
                                      text-blue-800">
                                Before You Apply
                            </p>
                            <h3 class="mt-1 font-bold text-slate-900">
                                Reservation Guidelines
                            </h3>
                            <p class="mt-1 text-sm text-slate-600">
                                Prepare your event details and requirements
                                before submitting a request.
                            </p>
                        </div>
                    </article>

                    <!-- Update 2 -->
                    <article class="flex items-center gap-4 rounded-xl
                                    border border-slate-200 bg-white p-4
                                    shadow-sm transition hover:shadow-md sm:p-5">

                        <div class="flex h-14 w-14 shrink-0 items-center
                                    justify-center rounded-lg bg-teal-100
                                    text-teal-800">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-7 w-7" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round"
                                 stroke-linejoin="round" aria-hidden="true">
                                <rect x="3" y="5" width="18" height="16" rx="2"/>
                                <path d="M16 3v4M8 3v4M3 10h18M8 14h.01M12 14h.01M16 14h.01M8 17h.01M12 17h.01"/>
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-bold uppercase tracking-wide
                                      text-teal-700">
                                Plan Ahead
                            </p>
                            <h3 class="mt-1 font-bold text-slate-900">
                                Venue Availability
                            </h3>
                            <p class="mt-1 text-sm text-slate-600">
                                Check available dates through the official
                                CPDO availability information.
                            </p>
                        </div>
                    </article>

                    <!-- Update 3 -->
                    <article class="flex items-center gap-4 rounded-xl
                                    border border-slate-200 bg-white p-4
                                    shadow-sm transition hover:shadow-md sm:p-5">

                        <div class="flex h-14 w-14 shrink-0 items-center
                                    justify-center rounded-lg bg-violet-100
                                    text-violet-800">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-7 w-7" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round"
                                 stroke-linejoin="round" aria-hidden="true">
                                <rect x="5" y="4" width="14" height="18" rx="2"/>
                                <path d="M9 4.5h6V7H9zM9 13l2 2 4-4M9 18h6"/>
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-bold uppercase tracking-wide
                                      text-violet-700">
                                Request Process
                            </p>
                            <h3 class="mt-1 font-bold text-slate-900">
                                Reservation Requests
                            </h3>
                            <p class="mt-1 text-sm text-slate-600">
                                Sign in to submit a reservation and monitor
                                your request status.
                            </p>
                        </div>
                    </article>

                    <!-- Update 4 -->
                    <article class="flex items-center gap-4 rounded-xl
                                    border border-slate-200 bg-white p-4
                                    shadow-sm transition hover:shadow-md sm:p-5">

                        <div class="flex h-14 w-14 shrink-0 items-center
                                    justify-center rounded-lg bg-amber-100
                                    text-amber-800">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-7 w-7" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round"
                                 stroke-linejoin="round" aria-hidden="true">
                                <path d="m3 11 18-5v12L3 13z"/>
                                <path d="M11.6 15.4 13 21H8l-2-8M21 12h2"/>
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-bold uppercase tracking-wide
                                      text-amber-700">
                                Office Information
                            </p>
                            <h3 class="mt-1 font-bold text-slate-900">
                                CPDO Office Notices
                            </h3>
                            <p class="mt-1 text-sm text-slate-600">
                                Check official office announcements and
                                reservation-related reminders.
                            </p>
                        </div>
                    </article>

                </div>

                <p class="mt-6 text-center text-xs text-slate-500">
                    For assistance, please contact the CPDO office.
                </p>

            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="flex flex-col items-center justify-between gap-2
                   bg-slate-950 px-6 py-5 text-sm text-slate-300
                   sm:flex-row sm:px-10">

        <p class="font-semibold">
            CPDO Venue Reservation System
        </p>

        <p class="text-xs text-slate-400">
            Official venue reservation portal
        </p>
    </footer>

</div>

</body>
</html>
