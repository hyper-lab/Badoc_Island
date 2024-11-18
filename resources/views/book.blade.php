<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step-by-Step Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 sm:p-6 lg:p-10">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <!-- Step Indicator Header -->
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="step-indicator w-8 h-8 flex items-center justify-center rounded-full bg-indigo-600 text-white">1</div>
                        <div class="ml-2 text-gray-700">ITINERARY</div>
                    </div>
                    <div class="flex items-center">
                        <div class="step-indicator w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-700">2</div>
                        <div class="ml-2 text-gray-700">ACCOMMODATION</div>
                    </div>
                    <div class="flex items-center">
                        <div class="step-indicator w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-700">3</div>
                        <div class="ml-2 text-gray-700">RESERVATION DETAILS</div>
                    </div>
                    <div class="flex items-center">
                        <div class="step-indicator w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-700">4</div>
                        <div class="ml-2 text-gray-700">CONFIRMATION</div>
                    </div>
                </div>
            </div>
            
            <form id="multiStepForm">
                <!-- Step 1 -->
                <div class="step">
                    <h2 class="text-2xl font-semibold mb-4">Step 1: ITINERARY</h2>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Location: Badoc Ilocos Norte</label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Destination: Badoc Water Park</label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Select Date</label>
                        <input type="text" id="datePicker" class="w-full px-3 py-2 border rounded-lg" placeholder="Select a date">
                    </div>
                    <button type="button" class="nextStep bg-indigo-600 text-white px-4 py-2 rounded-lg">Next</button>
                </div>
                <!-- Step 2 -->
                <div class="step hidden">
                    <h2 class="text-2xl font-semibold mb-4">Step 2: ACCOMMODATION</h2>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Select</th>
                                <th class="py-2 px-4 border-b">Accommodation</th>
                                <th class="py-2 px-4 border-b">Slots</th>
                                <th class="py-2 px-4 border-b">Price (individual)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accommodations as $accommodation)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">
                                        <input type="radio" name="accommodation" value="{{ $accommodation->acc_id }}">
                                    </td>
                                    <td class="py-2 px-4 border-b">{{ $accommodation->acc_type }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $accommodation->acc_slot }}</td>
                                    <td class="py-2 px-4 border-b text-center">₱{{ $accommodation->acc_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="prevStep bg-gray-600 text-white px-4 py-2 rounded-lg mt-4">Previous</button>
                    <button type="button" class="nextStep bg-indigo-600 text-white px-4 py-2 rounded-lg mt-4">Next</button>
                </div>
                <!-- Step 3 -->
                <div class="step hidden">
                    <h2 class="text-2xl font-semibold mb-4">Step 3: RESERVATOR INFO</h2>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Booked By</label>
                        <input type="text" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter First Name and Last Name">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Contact</label>
                        <input type="text" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter Contact">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Address</label>
                        <input type="text" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter Address">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Email</label>
                        <input type="email" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter Email">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Number of Clients</label>
                        <input type="number" id="numClients" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter Number of Clients">
                    </div>
                    <div id="clientForms"></div>
                    <button type="button" class="prevStep bg-gray-600 text-white px-4 py-2 rounded-lg mt-4">Previous</button>
                    <button type="button" class="nextStep bg-indigo-600 text-white px-4 py-2 rounded-lg mt-4">Next</button>
                </div>
                <!-- Step 4 -->
                <div class="step hidden">
                    <h2 class="text-2xl font-semibold mb-4">Step 4: CONFIRMATION</h2>
                    <p class="mb-4">Please review your information before submitting.</p>
                    <button type="button" class="prevStep bg-gray-600 text-white px-4 py-2 rounded-lg">Previous</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.step');
            const stepIndicators = document.querySelectorAll('.step-indicator');
            let currentStep = 0;

            function showStep(step) {
                steps.forEach((stepElement, index) => {
                    stepElement.classList.toggle('hidden', index !== step);
                });
                stepIndicators.forEach((indicator, index) => {
                    if (index <= step) {
                        indicator.classList.add('bg-indigo-600', 'text-white');
                        indicator.classList.remove('bg-gray-300', 'text-gray-700');
                    } else {
                        indicator.classList.add('bg-gray-300', 'text-gray-700');
                        indicator.classList.remove('bg-indigo-600', 'text-white');
                    }
                });
            }

            document.querySelectorAll('.nextStep').forEach(button => {
                button.addEventListener('click', () => {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                });
            });

            document.querySelectorAll('.prevStep').forEach(button => {
                button.addEventListener('click', () => {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            // Generate client forms based on the number of clients
            document.getElementById('numClients').addEventListener('input', function () {
                const numClients = parseInt(this.value);
                const clientFormsContainer = document.getElementById('clientForms');
                clientFormsContainer.innerHTML = '';

                for (let i = 1; i <= numClients; i++) {
                    const clientForm = document.createElement('div');
                    clientForm.classList.add('mb-4');
                    clientForm.innerHTML = `
                        <h2 class="text-2xl font-semibold mb-4">Client(${i})</h2>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Full Name</label>
                            <input type="text" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter Fullname">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Age</label>
                            <input type="number" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter Age">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Gender</label>
                            <select class="w-full px-3 py-2 border rounded-lg">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    `;
                    clientFormsContainer.appendChild(clientForm);
                }
            });

            showStep(currentStep);
        });
    </script>
</body>
</html>