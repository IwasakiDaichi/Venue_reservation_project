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

    const[name, setName] = useState('');
    const[department, setDepartment] = useState('');
    const[dateApplied, setDateApplied] = useState('');
    const[mobileNumber, setMobileNumber] = useState('');
    const[purpose, setPurpose] = useState('');

    const[venue, setVenue] = useState('')
    const[otherVenue, setOtherVenue] = useState('')

    const[reservedDate, setReservedDate] = useState('')
    const[time, setTime] = useState('')

    const[soundSystem, setSoundSystem] = useState('')
    const[microphone, setMicrophone] = useState('')
    const[videoWall, setVideoWall] = useState('')

    const[otherRequrements1, setOtherRequrements1] = useState('')
    const[otherRequrements2, setOtherRequrements2] = useState('')

    const[flags, setFlags] = useState('')
    const[podium, setPodium] = useState('')
    const[platform, setPlatform] = useState('')
    const[tables, setTables] = useState('')
    const[chairs, setChairs] = useState('')
    const[removalOfRings, setRemovalOfRings] = useState('')
    
    const[agreed, setAgreed] = useState(false)

    const[applicantsSigniture, setApplicantsSigniture] = useState('')

    const[securitySigniture, setSecuritySigniture] = useState('')
    
    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();

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
                            <span className="text-2xl text-green-600">
                                ✓
                            </span>
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
                    Venure Reservation
                </h1>
                <p className="mt-2 text-gray-600">
                    CPDO Reservation Form
                </p>
            </div>

            <h2 className="mb-6 text-2xl font-semibold text-gray-800">
                Applicant Information
            </h2>

            <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
                <label className="mb-2 block text-sm font-medium text-gray-700">
                    Name of Applicant: 
                </label>
                <input 
                    type="text" 
                    value={name}
                    className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    onChange={(e)=> setName(e.target.value)}
                />
                <label className="mb-2 block text-sm font-medium text-gray-700">
                    Department/Local No.: 
                </label>
                <input 
                    type="text" 
                    value={department}
                    className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    onChange={(e)=> setDepartment(e.target.value)}
                />
                <label className="mb-2 block text-sm font-medium text-gray-700">
                    Date Applied: 
                </label>
                <input 
                    type="date" 
                    value={dateApplied}
                    onChange={(e)=> setDateApplied(e.target.value)}
                    className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                />
                <label className="mb-2 block text-sm font-medium text-gray-700">
                    Mobile Number: 
                </label>
                <input 
                    type="text" 
                    value={mobileNumber}
                    className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    onChange={(e)=> setMobileNumber(e.target.value)}
                />
                <label className="mb-2 block text-sm font-medium text-gray-700">
                    Purpose: 
                </label>
                <input 
                    type="text" 
                    value={purpose}
                    className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    onChange={(e)=> setPurpose(e.target.value)}
                />
            </div>

            <h2 className="mb-6 text-2xl font-semibold text-gray-800">Venue/Capacity</h2>
            <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="Campus Gym"
                        checked={venue === 'Campus Gym'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">UB Cardinals Gym</span>
                        <span className="block text-sm text-gray-500">
                            2,000 - 2,500 capacity
                        </span>
                    </span>
                </label>
                
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="RCB Dome"
                        checked={venue === 'RCB Dome'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">RCB Dome</span>
                        <span className="block text-sm text-gray-500">
                            200 armchairs
                        </span>
                    </span>
                </label>
                
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="FGB Hall"
                        checked={venue === 'FGB Hall'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">FGB Hall</span>
                        <span className="block text-sm text-gray-500">
                            150 - 200 capacity
                        </span>
                    </span>
                </label>
                
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="Centenial Hall"
                        checked={venue === 'Centenial Hall'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">Centennial Hall</span>
                        <span className="block text-sm text-gray-500">
                            100 - 150 capacity
                        </span>
                    </span>
                </label>
                
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="AMS Hall"
                        checked={venue === 'AMS Hall'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">AMS Hall</span>
                        <span className="block text-sm text-gray-500">
                            120 armchairs
                        </span>
                    </span>
                </label>
                
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="Legacy"
                        checked={venue === 'Legacy'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">Legacy Multipurpose Hall</span>
                        <span className="block text-sm text-gray-500">
                            150 - 300 capacity
                        </span>
                    </span>
                </label>
                
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="UB Student Center"
                        checked={venue === 'UB Student Center'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">UB Student Center</span>
                        <span className="block text-sm text-gray-500">
                            100 capacity
                        </span>
                    </span>
                </label>
                
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="Alumni AVR"
                        checked={venue === 'Alumni AVR'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">Alumni AVR</span>
                        <span className="block text-sm text-gray-500">
                            55 capacity
                        </span>
                    </span>
                </label>
                
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="Centennial AVR"
                        checked={venue === 'Centennial AVR'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">Centennial AVR</span>
                        <span className="block text-sm text-gray-500">
                            35 capacity
                        </span>
                    </span>
                </label>
                
                
                <label className="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-300 p-4 hover:bg-gray-50">
                    <input
                        type="radio"
                        name="venue"
                        value="Other"
                        checked={venue === 'Other'}
                        onChange={(e) => setVenue(e.target.value)}
                        className="h-4 w-4"
                    />
            
                    <span>
                        <span className="font-medium">Other</span>
                        <span className="block text-sm text-gray-500">
                            Specify another venue
                        </span>
                    </span>
                </label>
                
            </div>

            <h2 className="mb-6 text-2xl font-semibold text-gray-800">Reserve Date(s)</h2>

            <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
                

            <label className="mb-2 block text-sm font-medium text-gray-700">
                Reserved Date
            </label>
            <input 
                type="date"
                value={reservedDate}
                 className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                onChange={(e) => setReservedDate(e.target.value)}
            />
            
            <label className="mb-2 block text-sm font-medium text-gray-700">
                Time
            </label>
            <input 
                type="time" 
                value={time}
                 className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                onChange={(e) => setTime(e.target.value)}
            />
            </div>

            <h2 className="mb-6 text-2xl font-semibold text-gray-800">Requrements</h2>

            <div className="space-y-8">

                {/* Equipment */}
                <div>
                    <h3 className="mb-4 text-lg font-semibold text-gray-800">
                        Equipment
                    </h3>

                    <div className="grid grid-cols-1 gap-4 md:grid-cols-2">

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Sound System
                            </label>
                            <input
                                type="text"
                                value={soundSystem}
                                onChange={(e) => setSoundSystem(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Specify requirement"
                            />
                        </div>

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Microphone
                            </label>
                            <input
                                type="text"
                                value={microphone}
                                onChange={(e) => setMicrophone(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Specify requirement"
                            />
                        </div>

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                LED Video Wall
                            </label>
                            <input
                                type="text"
                                value={videoWall}
                                onChange={(e) => setVideoWall(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Specify requirement"
                            />
                        </div>

                    </div>
                </div>


                {/* Physical Set-Up */}
                <div>
                    <h3 className="mb-4 text-lg font-semibold text-gray-800">
                        Physical Set-Up
                    </h3>

                    <div className="grid grid-cols-1 gap-4 md:grid-cols-2">

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Flags (UB and Philippines)
                            </label>
                            <input
                                type="text"
                                value={flags}
                                onChange={(e) => setFlags(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Specify requirement"
                            />
                        </div>

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Podium
                            </label>
                            <input
                                type="text"
                                value={podium}
                                onChange={(e) => setPodium(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Specify requirement"
                            />
                        </div>

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Platform
                            </label>
                            <input
                                type="text"
                                value={platform}
                                onChange={(e) => setPlatform(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Specify requirement"
                            />
                        </div>

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Number of Tables
                            </label>
                            <input
                                type="number"
                                min="0"
                                value={tables}
                                onChange={(e) => setTables(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="0"
                            />
                        </div>

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Number of Chairs
                            </label>
                            <input
                                type="number"
                                min="0"
                                value={chairs}
                                onChange={(e) => setChairs(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="0"
                            />
                        </div>

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Removal of Rings-Goal (GYM)
                            </label>
                            <input
                                type="text"
                                value={removalOfRings}
                                onChange={(e) => setRemovalOfRings(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Specify requirement"
                            />
                        </div>

                    </div>
                </div>


                {/* Other Requirements */}
                <div>
                    <h3 className="mb-4 text-lg font-semibold text-gray-800">
                        Others, please specify
                    </h3>

                    <div className="grid grid-cols-1 gap-4 md:grid-cols-2">

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Other Requirement 1
                            </label>
                            <input
                                type="text"
                                value={otherRequrements1}
                                onChange={(e) => setOtherRequrements1(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Specify requirement"
                            />
                        </div>

                        <div>
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Other Requirement 2
                            </label>
                            <input
                                type="text"
                                value={otherRequrements2}
                                onChange={(e) => setOtherRequrements2(e.target.value)}
                                className="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                placeholder="Specify requirement"
                            />
                        </div>

                    </div>
                </div>

            </div>


                        {/* Terms and Conditions */}
            <div className="mt-8 border-t pt-8">

                <h2 className="mb-6 text-2xl font-bold text-gray-900">
                    Terms and Conditions
                </h2>

                {/* University / School Events */}
                <div className="mb-6 rounded-lg border border-gray-200 bg-gray-50 p-5">
                    <h3 className="mb-4 text-lg font-semibold text-gray-800">
                        University/School Events
                    </h3>

                    <ol className="list-decimal space-y-2 pl-6 text-sm leading-6 text-gray-700">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ol>
                </div>

                {/* External Organization */}
                <div className="mb-6 rounded-lg border border-gray-200 bg-gray-50 p-5">
                    <h3 className="mb-4 text-lg font-semibold text-gray-800">
                        External Organization
                    </h3>

                    <ol className="list-decimal space-y-2 pl-6 text-sm leading-6 text-gray-700">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ol>
                </div>

                {/* Agreement */}
                <div className="rounded-lg border border-gray-200 bg-white p-4">
                    <label className="flex cursor-pointer items-center gap-3 text-sm text-gray-700">
                        <input
                            type="checkbox"
                            checked={agreed}
                            onChange={(e) => setAgreed(e.target.checked)}
                            className="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-200"
                        />

                        <span>
                            I have read and agree to the terms and conditions.
                        </span>
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
                            type="text"
                            value={applicantsSigniture}
                            onChange={(e) => setApplicantsSigniture(e.target.value)}
                            className="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                            placeholder="Enter signature name"
                        />

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

    )
}