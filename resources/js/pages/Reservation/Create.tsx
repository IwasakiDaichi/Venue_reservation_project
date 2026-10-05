import { useEffect, useState } from 'react';
import { router, usePage } from '@inertiajs/react';

export default function Create(){

    const { flash } = usePage<{
        flash: {
            success?: string;
        };
    }>().props;
    
    const [showSuccess, setShowSuccess] = useState(false);
    useEffect(() => {
        if (flash?.success) {
            setShowSuccess(true);
        }
    }, [flash?.success]);

    const [name, setName] = useState('');
    const [department, setDepartment] = useState('');
    const [dateApplied, setDateApplied] = useState('');
    const [mobileNumber, setMobileNumber] = useState('');
    const [purpose, setPurpose] = useState('');

    const [venue, setVenue] = useState('');
    const [otherVenue, setOtherVenue] = useState('');

    const [reservedDate, setReservedDate] = useState('');
    const [time, setTime] = useState('');

    const [soundSystem, setSoundSystem] = useState('');
    const [microphone, setMicrophone] = useState('');
    const [videoWall, setVideoWall] = useState('');

    const [otherRequrements1, setOtherRequrements1] = useState('');
    const [otherRequrements2, setOtherRequrements2] = useState('');

    const [flags, setFlags] = useState('');
    const [podium, setPodium] = useState('');
    const [platform, setPlatform] = useState('');
    const [tables, setTables] = useState('');
    const [chairs, setChairs] = useState('');
    const [removalOfRings, setRemovalOfRings] = useState('');
    
    const [agreed, setAgreed] = useState(false);
    const [applicantsSigniture, setApplicantsSigniture] = useState('');
    const [securitySigniture, setSecuritySigniture] = useState('');

    // Error States
    const [nameError, setNameError] = useState(false);
    const [departmentError, setDepartmentError] = useState(false);
    const [mobileNumberError, setMobileNumberError] = useState(false);
    const [purposeError, setPurposeError] = useState(false);
    const [reservedDateError, setReservedDateError] = useState(false);
    const [timeError, setTimeError] = useState(false);

    const [venueError, setVenueError] = useState('');
    const [agreementError, setAgreementError] = useState('');
    const [signatureError, setSignatureError] = useState('');
    
    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
    
        // Reset errors
        setNameError(false);
        setDepartmentError(false);
        setMobileNumberError(false);
        setPurposeError(false);
        setReservedDateError(false);
        setTimeError(false);
        setVenueError('');
        setAgreementError('');
        setSignatureError('');

        let hasError = false;
        let firstErrorElement: HTMLElement | null = null;

        if (!name) {
            setNameError(true);
            const el = document.getElementById('name');
            if (!firstErrorElement) firstErrorElement = el;
            hasError = true;
        }
    
        if (!department) {
            setDepartmentError(true);
            const el = document.getElementById('department');
            if (!firstErrorElement) firstErrorElement = el;
            hasError = true;
        }
    
        if (!mobileNumber) {
            setMobileNumberError(true);
            const el = document.getElementById('mobileNumber');
            if (!firstErrorElement) firstErrorElement = el;
            hasError = true;
        }
    
        if (!purpose) {
            setPurposeError(true);
            const el = document.getElementById('purpose');
            if (!firstErrorElement) firstErrorElement = el;
            hasError = true;
        }
    
        if (!venue) {
            setVenueError('Please select a venue to proceed.');
            const el = document.getElementById('venue-section');
            if (!firstErrorElement) firstErrorElement = el;
            hasError = true;
        }
    
        if (!reservedDate) {
            setReservedDateError(true);
            const el = document.getElementById('reservedDate');
            if (!firstErrorElement) firstErrorElement = el;
            hasError = true;
        }
    
        if (!time) {
            setTimeError(true);
            const el = document.getElementById('time');
            if (!firstErrorElement) firstErrorElement = el;
            hasError = true;
        }

        if (!agreed) {
            setAgreementError('You must agree to the terms and conditions.');
            const el = document.getElementById('agreement-section');
            if (!firstErrorElement) firstErrorElement = el;
            hasError = true;
        }

        if (!applicantsSigniture) {
            setSignatureError('Please provide your signature.');
            const el = document.getElementById('applicantsSigniture');
            if (!firstErrorElement) firstErrorElement = el;
            hasError = true;
        }

        if (hasError && firstErrorElement) {
            firstErrorElement.scrollIntoView({
                behavior: 'smooth',
                block: 'center',
            });
            if ('focus' in firstErrorElement && typeof firstErrorElement.focus === 'function') {
                firstErrorElement.focus();
            }
            return;
        }
    
        router.post('/reservation', {
            name,
            department,
            dateApplied,
            mobileNumber,
            purpose,
            venue,
            otherVenue,
            reservedDate,
            time,
            soundSystem,
            microphone,
            videoWall,
            flags,
            podium,
            platform,
            tables,
            chairs,
            removalOfRings,
            otherRequrements1,
            otherRequrements2,
            agreed,
            applicantsSigniture,
            securitySigniture,
        });
    };

    return(
        <div className='min-h-screen bg-gray-100 py-10'>
            
            {showSuccess && (
                <div className="fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4">
                    <div className="w-full max-w-md rounded-xl bg-white p-8 text-center shadow-2xl">
                        <div className="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-green-100">
                            <span className="text-2xl text-green-600">✓</span>
                        </div>
                        <h2 className="mb-2 text-2xl font-bold text-gray-900">
                            Reservation Submitted
                        </h2>
                        <p className="mb-6 text-gray-600">
                            {flash?.success}
                        </p>
                        <button
                            type="button"
                            onClick={() => setShowSuccess(false)}
                            className="rounded-lg bg-blue-600 px-6 py-2.5 font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
                        >
                            Close
                        </button>
                    </div>
                </div>
            )}

            <form 
                onSubmit={handleSubmit}
                className="mx-auto max-w-4xl space-y-8 rounded-lg bg-white p-8 shadow"
            >

                <div className="mb-8 border-b pb-6">
                    <h1 className="text-3xl font-bold text-gray-900">
                        Venue Reservation
                    </h1>
                    <p className="mt-2 text-gray-600">
                        CPDO Reservation Form
                    </p>
                </div>

                <h2 className="mb-6 text-2xl font-semibold text-gray-800">
                    Applicant Information
                </h2>

                <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label className="mb-2 block text-sm font-medium text-gray-700">
                            Name of Applicant: 
                        </label>
                        <input 
                            id='name'
                            type="text" 
                            value={name}
                            className={`w-full rounded-lg border px-4 py-2.5 outline-none transition ${
                                nameError 
                                    ? 'border-red-500 bg-red-50 focus:border-red-500 focus:ring-2 focus:ring-red-200' 
                                    : 'border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200'
                            }`}
                            placeholder={nameError ? "Please fill up this field" : ""}
                            onChange={(e)=> { setName(e.target.value); if(nameError) setNameError(false); }}
                        />
                        {nameError && <p className="mt-1 text-xs text-red-600">This field is required.</p>}
                    </div>

                    <div>
                        <label className="mb-2 block text-sm font-medium text-gray-700">
                            Department/Local No.: 
                        </label>
                        <input 
                            id='department'
                            type="text" 
                            value={department}
                            className={`w-full rounded-lg border px-4 py-2.5 outline-none transition ${
                                departmentError 
                                    ? 'border-red-500 bg-red-50 focus:border-red-500 focus:ring-2 focus:ring-red-200' 
                                    : 'border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200'
                            }`}
                            placeholder={departmentError ? "Please fill up this field" : ""}
                            onChange={(e)=> { setDepartment(e.target.value); if(departmentError) setDepartmentError(false); }}
                        />
                        {departmentError && <p className="mt-1 text-xs text-red-600">This field is required.</p>}
                    </div>

                    <div>
                        <label className="mb-2 block text-sm font-medium text-gray-700">
                            Date Applied: 
                        </label>
                        <input 
                            id='dateApplied'
                            type="date" 
                            value={dateApplied}
                            onChange={(e)=> setDateApplied(e.target.value)}
                            className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                        />
                    </div>

                    <div>
                        <label className="mb-2 block text-sm font-medium text-gray-700">
                            Mobile Number: 
                        </label>
                        <input 
                            id='mobileNumber'
                            type="text" 
                            value={mobileNumber}
                            className={`w-full rounded-lg border px-4 py-2.5 outline-none transition ${
                                mobileNumberError 
                                    ? 'border-red-500 bg-red-50 focus:border-red-500 focus:ring-2 focus:ring-red-200' 
                                    : 'border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200'
                            }`}
                            placeholder={mobileNumberError ? "Please fill up this field" : ""}
                            onChange={(e)=> { setMobileNumber(e.target.value); if(mobileNumberError) setMobileNumberError(false); }}
                        />
                        {mobileNumberError && <p className="mt-1 text-xs text-red-600">This field is required.</p>}
                    </div>

                    <div className="md:col-span-2">
                        <label className="mb-2 block text-sm font-medium text-gray-700">
                            Purpose: 
                        </label>
                        <input 
                            id='purpose'
                            type="text" 
                            value={purpose}
                            className={`w-full rounded-lg border px-4 py-2.5 outline-none transition ${
                                purposeError 
                                    ? 'border-red-500 bg-red-50 focus:border-red-500 focus:ring-2 focus:ring-red-200' 
                                    : 'border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200'
                            }`}
                            placeholder={purposeError ? "Please fill up this field" : ""}
                            onChange={(e)=> { setPurpose(e.target.value); if(purposeError) setPurposeError(false); }}
                        />
                        {purposeError && <p className="mt-1 text-xs text-red-600">This field is required.</p>}
                    </div>
                </div>

                <div id='venue-section' className='mb-6'>
                    <h2 className="mb-4 text-2xl font-semibold text-gray-800">Venue/Capacity</h2>

                    {venueError && (
                        <div className="mb-4 rounded-lg bg-red-50 p-4 text-sm font-medium text-red-600 border border-red-200">
                            ⚠️ {venueError}
                        </div>
                    )}

                    <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
                        {[
                            { name: "Campus Gym", label: "UB Cardinals Gym", cap: "2,000 - 2,500 capacity" },
                            { name: "RCB Dome", label: "RCB Dome", cap: "200 armchairs" },
                            { name: "FGB Hall", label: "FGB Hall", cap: "150 - 200 capacity" },
                            { name: "Centenial Hall", label: "Centennial Hall", cap: "100 - 150 capacity" },
                            { name: "AMS Hall", label: "AMS Hall", cap: "120 armchairs" },
                            { name: "Legacy", label: "Legacy Multipurpose Hall", cap: "150 - 300 capacity" },
                            { name: "UB Student Center", label: "UB Student Center", cap: "100 capacity" },
                            { name: "Alumni AVR", label: "Alumni AVR", cap: "55 capacity" },
                            { name: "Centennial AVR", label: "Centennial AVR", cap: "35 capacity" },
                            { name: "Other", label: "Other", cap: "Specify another venue" }
                        ].map((item) => (
                            <label key={item.name} className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                                <input
                                    type="radio"
                                    name="venue"
                                    value={item.name}
                                    checked={venue === item.name}
                                    onChange={(e) => { setVenue(e.target.value); if(venueError) setVenueError(''); }}
                                    className="h-4 w-4"
                                />
                                <span>
                                    <span className="font-medium">{item.label}</span>
                                    <span className="block text-sm text-gray-500">{item.cap}</span>
                                </span>
                            </label>
                        ))}
                    </div>
                </div>

                <h2 className="mb-6 text-2xl font-semibold text-gray-800">Reserve Date(s)</h2>

                <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label className="mb-2 block text-sm font-medium text-gray-700">
                            Reserved Date
                        </label>
                        <input 
                            id='reservedDate'
                            type="date"
                            value={reservedDate}
                            className={`w-full rounded-lg border px-4 py-2.5 outline-none transition ${
                                reservedDateError 
                                    ? 'border-red-500 bg-red-50 focus:border-red-500 focus:ring-2 focus:ring-red-200' 
                                    : 'border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200'
                            }`}
                            onChange={(e) => { setReservedDate(e.target.value); if(reservedDateError) setReservedDateError(false); }}
                        />
                        {reservedDateError && <p className="mt-1 text-xs text-red-600">Please select a reserved date.</p>}
                    </div>
                    
                    <div>
                        <label className="mb-2 block text-sm font-medium text-gray-700">
                            Time
                        </label>
                        <input 
                            id='time'
                            type="time" 
                            value={time}
                            className={`w-full rounded-lg border px-4 py-2.5 outline-none transition ${
                                timeError 
                                    ? 'border-red-500 bg-red-50 focus:border-red-500 focus:ring-2 focus:ring-red-200' 
                                    : 'border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200'
                            }`}
                            onChange={(e) => { setTime(e.target.value); if(timeError) setTimeError(false); }}
                        />
                        {timeError && <p className="mt-1 text-xs text-red-600">Please specify the time.</p>}
                    </div>
                </div>

                <h2 className="mb-6 text-2xl font-semibold text-gray-800">Requirements</h2>

                <div className="space-y-8">
                    <div>
                        <h3 className="mb-4 text-lg font-semibold text-gray-800">Equipment</h3>
                        <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Sound System</label>
                                <input type="text" value={soundSystem} onChange={(e) => setSoundSystem(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Specify requirement" />
                            </div>
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Microphone</label>
                                <input type="text" value={microphone} onChange={(e) => setMicrophone(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Specify requirement" />
                            </div>
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">LED Video Wall</label>
                                <input type="text" value={videoWall} onChange={(e) => setVideoWall(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Specify requirement" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 className="mb-4 text-lg font-semibold text-gray-800">Physical Set-Up</h3>
                        <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Flags (UB and Philippines)</label>
                                <input type="text" value={flags} onChange={(e) => setFlags(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Specify requirement" />
                            </div>
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Podium</label>
                                <input type="text" value={podium} onChange={(e) => setPodium(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Specify requirement" />
                            </div>
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Platform</label>
                                <input type="text" value={platform} onChange={(e) => setPlatform(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Specify requirement" />
                            </div>
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Number of Tables</label>
                                <input type="number" min="0" value={tables} onChange={(e) => setTables(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="0" />
                            </div>
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Number of Chairs</label>
                                <input type="number" min="0" value={chairs} onChange={(e) => setChairs(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="0" />
                            </div>
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Removal of Rings-Goal (GYM)</label>
                                <input type="text" value={removalOfRings} onChange={(e) => setRemovalOfRings(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Specify requirement" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 className="mb-4 text-lg font-semibold text-gray-800">Others, please specify</h3>
                        <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Other Requirement 1</label>
                                <input type="text" value={otherRequrements1} onChange={(e) => setOtherRequrements1(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Specify requirement" />
                            </div>
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-700">Other Requirement 2</label>
                                <input type="text" value={otherRequrements2} onChange={(e) => setOtherRequrements2(e.target.value)} className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Specify requirement" />
                            </div>
                        </div>
                    </div>
                </div>

                {/* Terms and Conditions */}
                <div id="agreement-section" className="mt-8 border-t pt-8">
                    <h2 className="mb-6 text-2xl font-bold text-gray-900">
                        Terms and Conditions
                    </h2>

                    {agreementError && (
                        <div className="mb-4 rounded-lg bg-red-50 p-4 text-sm font-medium text-red-600 border border-red-200">
                            ⚠️ {agreementError}
                        </div>
                    )}

                    <div className="mb-6 rounded-lg border border-gray-200 bg-gray-50 p-5">
                        <h3 className="mb-4 text-lg font-semibold text-gray-800">University/School Events</h3>
                        <ol className="list-decimal space-y-2 pl-6 text-sm leading-6 text-gray-700">
                            <li>

                            </li>
                            <li>
                                
                            </li>
                            <li>
                                
                            </li>
                            <li>
                                
                            </li>
                            <li>
                                
                            </li>
                            <li>
                                
                            </li>
                        </ol>
                    </div>

                    <div className="mb-6 rounded-lg border border-gray-200 bg-gray-50 p-5">
                        <h3 className="mb-4 text-lg font-semibold text-gray-800">External Organization</h3>
                        <ol className="list-decimal space-y-2 pl-6 text-sm leading-6 text-gray-700">
                            <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                        </ol>
                    </div>

                    <div className="rounded-lg border border-gray-200 bg-white p-4">
                        <label className="flex cursor-pointer items-center gap-3 text-sm text-gray-700">
                            <input
                                type="checkbox"
                                checked={agreed}
                                onChange={(e) => { setAgreed(e.target.checked); if(agreementError) setAgreementError(''); }}
                                className="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-200"
                            />
                            <span>I have read and agree to the terms and conditions.</span>
                        </label>
                    </div>
                </div>

                {/* Approval */}
                <div className="mt-8 border-t pt-8">
                    <h2 className="mb-6 text-2xl font-bold text-gray-900">
                        Approval
                    </h2>

                    <div className="grid grid-cols-1 gap-6 md:grid-cols-2">
                        {/* Applicant */}
                        <div className="rounded-lg border border-gray-200 bg-gray-50 p-5">
                            <h3 className="mb-4 text-lg font-semibold text-gray-800">
                                Applicant
                            </h3>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Signature over printed name
                            </label>
                            <input
                                id="applicantsSigniture"
                                type="text"
                                value={applicantsSigniture}
                                onChange={(e) => { setApplicantsSigniture(e.target.value); if(signatureError) setSignatureError(''); }}
                                className={`w-full rounded-lg border bg-white px-4 py-2.5 outline-none transition ${
                                    signatureError 
                                        ? 'border-red-500 bg-red-50 focus:border-red-500 focus:ring-2 focus:ring-red-200' 
                                        : 'border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200'
                                }`}
                                placeholder={signatureError ? "Please fill up your signature" : "Enter signature name"}
                            />
                            {signatureError && <p className="mt-1 text-xs text-red-600">{signatureError}</p>}
                        </div>

                        {/* Security Personnel */}
                        <div className="rounded-lg border border-gray-200 bg-gray-50 p-5">
                            <h3 className="mb-4 text-lg font-semibold text-gray-800">
                                Security Personnel
                            </h3>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Signature over printed name
                            </label>
                            <input
                                type="text"
                                value={securitySigniture}
                                onChange={(e) => setSecuritySigniture(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Enter signature name"
                            />
                        </div>
                    </div>
                </div>

                {/* Submit Button */}
                <div className="mt-8 flex justify-end border-t pt-6">
                    <button
                        type="submit"
                        className="rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
                    >
                        Submit Reservation
                    </button>
                </div>
            </form>
        </div>
    );
}