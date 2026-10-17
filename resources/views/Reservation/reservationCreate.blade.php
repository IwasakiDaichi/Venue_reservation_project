<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPDO Venue Reservation</title>
    @vite(['resources/css/app.css', 'resources/js/app.tsx'])
</head>
<body class="min-h-screen bg-slate-100 py-8 text-slate-800 sm:py-12">
    <main class="mx-auto max-w-5xl px-4 sm:px-6">
        @if (session('success'))
            <div id="success-message" class="mb-6 flex items-start justify-between gap-4 rounded-xl border border-green-200 bg-green-50 p-4 text-green-800" role="status">
                <div>
                    <p class="font-semibold">Reservation submitted</p>
                    <p class="mt-1 text-sm">{{ session('success') }}</p>
                </div>
                <button type="button" onclick="document.getElementById('success-message').remove()" class="rounded px-2 py-1 font-bold hover:bg-green-100" aria-label="Close message">&times;</button>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800">
                <p class="font-semibold">Please check the following fields:</p>
                <ul class="mt-2 list-inside list-disc text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/reservation') }}" method="POST" class="space-y-8">
            @csrf

            <header class="rounded-2xl bg-gradient-to-r from-blue-950 to-blue-800 p-8 text-white shadow-sm sm:p-10">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-200">CPDO</p>
                <h1 class="mt-2 text-3xl font-bold sm:text-4xl">Venue Reservation</h1>
                <p class="mt-3 max-w-2xl leading-7 text-blue-100">Complete the form below to submit a venue reservation request. Please review your details before submitting.</p>
            </header>

            <!-- Applicant information -->
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="mb-6 border-b border-slate-200 pb-4">
                    <h2 class="text-xl font-bold text-slate-900">01. Applicant Information</h2>
                    <p class="mt-1 text-sm text-slate-500">Provide your contact and department information.</p>
                </div>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium">Name of Applicant <span class="text-red-600">*</span></label>
                        <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name ?? '') }}" required autocomplete="name" class="form-input w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" />
                        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="department" class="mb-2 block text-sm font-medium">Department / Local No. <span class="text-red-600">*</span></label>
                        <input id="department" name="department" type="text" value="{{ old('department') }}" required class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" />
                        @error('department') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="dateApplied" class="mb-2 block text-sm font-medium">Date Applied</label>
                        <input id="dateApplied" name="dateApplied" type="date" value="{{ old('dateApplied', now()->toDateString()) }}" readonly class="w-full rounded-lg border border-slate-200 bg-slate-100 px-4 py-3 text-slate-600" />
                    </div>
                    <div>
                        <label for="mobileNumber" class="mb-2 block text-sm font-medium">Mobile Number <span class="text-red-600">*</span></label>
                        <input id="mobileNumber" name="mobileNumber" type="tel" value="{{ old('mobileNumber') }}" required autocomplete="tel" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" />
                        @error('mobileNumber') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label for="purpose" class="mb-2 block text-sm font-medium">Purpose of Reservation <span class="text-red-600">*</span></label>
                        <textarea id="purpose" name="purpose" rows="3" required class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">{{ old('purpose') }}</textarea>
                        @error('purpose') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
            </section>

            <!-- Venue -->
            <section id="venue-section" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="mb-6 border-b border-slate-200 pb-4">
                    <h2 class="text-xl font-bold text-slate-900">02. Venue Selection</h2>
                    <p class="mt-1 text-sm text-slate-500">Select the venue you want to reserve.</p>
                </div>
                <div>
                    <label for="venue" class="mb-2 block text-sm font-medium">Venue / Capacity <span class="text-red-600">*</span></label>
                    <select id="venue" name="venue" required class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                        <option value="">Choose a venue</option>
                        <option value="Campus Gym" @selected(old('venue') === 'Campus Gym')>UB Cardinals Gym — 2,000–2,500 capacity</option>
                        <option value="RCB Dome" @selected(old('venue') === 'RCB Dome')>RCB Dome — 200 armchairs</option>
                        <option value="FGB Hall" @selected(old('venue') === 'FGB Hall')>FGB Hall — 150–200 capacity</option>
                        <option value="Centenial Hall" @selected(old('venue') === 'Centenial Hall')>Centennial Hall — 100–150 capacity</option>
                        <option value="AMS Hall" @selected(old('venue') === 'AMS Hall')>AMS Hall — 120 armchairs</option>
                        <option value="Legacy" @selected(old('venue') === 'Legacy')>Legacy Multipurpose Hall — 150–300 capacity</option>
                        <option value="UB Student Center" @selected(old('venue') === 'UB Student Center')>UB Student Center — 100 capacity</option>
                        <option value="Alumni AVR" @selected(old('venue') === 'Alumni AVR')>Alumni AVR — 55 capacity</option>
                        <option value="Centennial AVR" @selected(old('venue') === 'Centennial AVR')>Centennial AVR — 35 capacity</option>
                        <option value="Other" @selected(old('venue') === 'Other')>Other venue</option>
                    </select>
                    @error('venue') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div id="other-venue-wrap" class="mt-5 {{ old('venue') === 'Other' ? '' : 'hidden' }}">
                    <label for="otherVenue" class="mb-2 block text-sm font-medium">Please specify the venue <span class="text-red-600">*</span></label>
                    <input id="otherVenue" name="otherVenue" type="text" value="{{ old('otherVenue') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" />
                    @error('otherVenue') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </section>

            <!-- Schedule -->
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="mb-6 border-b border-slate-200 pb-4">
                    <h2 class="text-xl font-bold text-slate-900">03. Reservation Schedule</h2>
                    <p class="mt-1 text-sm text-slate-500">Choose your requested date and time.</p>
                </div>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div>
                        <label for="reservedDate" class="mb-2 block text-sm font-medium">Reserved Date <span class="text-red-600">*</span></label>
                        <input id="reservedDate" name="reservedDate" type="date" value="{{ old('reservedDate') }}" min="{{ now()->toDateString() }}" required class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" />
                        @error('reservedDate') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="time" class="mb-2 block text-sm font-medium">Time <span class="text-red-600">*</span></label>
                        <input id="time" name="time" type="time" value="{{ old('time') }}" required class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" />
                        @error('time') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
            </section>

            <!-- Requirements -->
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="mb-6 border-b border-slate-200 pb-4">
                    <h2 class="text-xl font-bold text-slate-900">04. Equipment and Setup Requirements</h2>
                    <p class="mt-1 text-sm text-slate-500">Enter quantities or details for any items you need. Leave fields blank if not applicable.</p>
                </div>
                <h3 class="mb-4 font-semibold text-slate-800">Equipment</h3>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                    <div><label for="soundSystem" class="mb-2 block text-sm font-medium">Sound System</label><input id="soundSystem" name="soundSystem" value="{{ old('soundSystem') }}" type="text" placeholder="e.g. 1 set" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" /></div>
                    <div><label for="microphone" class="mb-2 block text-sm font-medium">Microphone</label><input id="microphone" name="microphone" value="{{ old('microphone') }}" type="text" placeholder="e.g. 2 units" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" /></div>
                    <div><label for="videoWall" class="mb-2 block text-sm font-medium">LED Video Wall</label><input id="videoWall" name="videoWall" value="{{ old('videoWall') }}" type="text" placeholder="Specify requirement" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" /></div>
                </div>
                
<h3 class="mb-4 mt-8 font-semibold text-slate-800">
    Physical Setup
</h3>

<div class="space-y-6">

    <!-- Physical Equipment -->
    <div>
        <p class="mb-3 text-sm font-medium text-slate-700">
            Physical Equipment
        </p>

        <div class="flex flex-wrap items-center gap-x-8 gap-y-4">

            <label for="flags" class="inline-flex items-center gap-2">
                <input
                    id="flags"
                    name="flags"
                    type="checkbox"
                    value="Yes"
                    {{ old('flags') === 'Yes' ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                >
                <span class="text-sm font-medium">
                    Flags (UB and Philippines)
                </span>
            </label>

            <label for="podium" class="inline-flex items-center gap-2">
                <input
                    id="podium"
                    name="podium"
                    type="checkbox"
                    value="Yes"
                    {{ old('podium') === 'Yes' ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                >
                <span class="text-sm font-medium">Podium</span>
            </label>

            <label for="platform" class="inline-flex items-center gap-2">
                <input
                    id="platform"
                    name="platform"
                    type="checkbox"
                    value="Yes"
                    {{ old('platform') === 'Yes' ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                >
                <span class="text-sm font-medium">Platform</span>
            </label>

        </div>
    </div>
        <!-- Gym-only option: preserve both IDs -->
   <div id="removalOfRingsContainer" class="hidden">
    <label for="removalOfRings" class="inline-flex items-center gap-2">
        <input
            id="removalOfRings"
            name="removalOfRings"
            type="checkbox"
            value="Yes"
            {{ old('removalOfRings') === 'Yes' ? 'checked' : '' }}
            class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
        >
        <span class="text-sm font-medium">
            Removal of Rings / Goal (Gym)
        </span>
    </label>
</div>

    <!-- Tables and Chairs -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

        <div>
            <label for="tables" class="mb-2 block text-sm font-medium">
                Number of Tables
            </label>
            <input
                id="tables"
                name="tables"
                type="number"
                min="0"
                placeholder="0"
                value="{{ old('tables') }}"
                class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
            >
        </div>

        <div>
            <label for="chairs" class="mb-2 block text-sm font-medium">
                Number of Chairs
            </label>
            <input
                id="chairs"
                name="chairs"
                type="number"
                min="0"
                placeholder="0"
                value="{{ old('chairs') }}"
                class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
            >
        </div>

    </div>



</div>

                <div class="mt-8">
                    <label for="otherRequrements1" class="mb-2 block text-sm font-medium">Other Requirements</label>
                    <textarea id="otherRequrements1" name="otherRequrements1" rows="4" placeholder="List any additional equipment, setup, or special requirements here..." class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">{{ old('otherRequrements1') }}</textarea>
                    <input type="hidden" name="otherRequrements2" value="">
                    @error('otherRequrements1') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </section>

            <!-- Terms -->
            <section id="agreement-section" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="mb-6 border-b border-slate-200 pb-4">
                    <h2 class="text-xl font-bold text-slate-900">05. Terms and Conditions</h2>
                    <p class="mt-1 text-sm text-slate-500">Review the applicable rules before submitting your request.</p>
                </div>
                <div class="space-y-5 rounded-xl bg-slate-50 p-5 text-sm leading-6 text-slate-600">
                    <div>
                        <h3 class="font-semibold text-slate-900">University / School Events</h3>
                        <p class="mt-2">Please follow the applicable university policies and CPDO instructions for venue use. Confirm event details and requested equipment before submitting.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-900">External Organizations</h3>
                        <p class="mt-2">External organizations should coordinate with CPDO regarding applicable requirements, permissions, and fees before using a venue.</p>
                    </div>
                    <p class="text-xs text-slate-500">Replace these summaries with the exact approved wording from your official CPDO form before production.</p>
                </div>
                <div class="mt-5">
                    <label for="agreed" class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 p-4">
                        <input id="agreed" name="agreed" type="checkbox" value="1" required @checked(old('agreed')) class="mt-1 h-4 w-4 rounded border-slate-300 text-blue-700 focus:ring-blue-500" />
                        <span class="text-sm text-slate-700">I have read and agree to the terms and conditions. <span class="text-red-600">*</span></span>
                    </label>
                    @error('agreed') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </section>

            <div class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-6 py-3 font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-blue-800 px-7 py-3 font-semibold text-white shadow-sm transition hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-200">Submit Reservation</button>
            </div>
        </form>
    </main>

    <script>
        const venueSelect = document.getElementById('venue');
        const otherVenueWrap = document.getElementById('other-venue-wrap');
        const otherVenueInput = document.getElementById('otherVenue');

        function updateOtherVenue() {
            const showOtherVenue = venueSelect.value === 'Other';
            otherVenueWrap.classList.toggle('hidden', !showOtherVenue);
            otherVenueInput.required = showOtherVenue;
            if (!showOtherVenue) otherVenueInput.value = '';
        }

        venueSelect.addEventListener('change', updateOtherVenue);
        updateOtherVenue();
    </script>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const venueSelect = document.querySelector('[name="venue"]');
        const removalContainer = document.getElementById(
            'removalOfRingsContainer'
        );
        const removalCheckbox = document.getElementById('removalOfRings');

        if (!venueSelect || !removalContainer || !removalCheckbox) {
            return;
        }

        function updateRemovalField() {
            const selectedVenue = venueSelect.value.toLowerCase();

            const isGym = selectedVenue.includes('gym');

            removalContainer.classList.toggle('hidden', !isGym);

            if (!isGym) {
                removalCheckbox.checked = false;
            }
        }

        venueSelect.addEventListener('change', updateRemovalField);

        updateRemovalField();
    });
</script>