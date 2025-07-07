<?php
session_start();  // Start the session to check if the user is logged in

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// If logged in, show the content of the dashboard
// echo "Welcome to your dashboard, " . $_SESSION['username'] . "!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
       
        body {
            background: url('https://cdn.britannica.com/12/130512-004-AD0A7CA4/campus-Riverside-Ottawa-The-Hospital-Ont.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease-in-out;
        }

        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }
       
    </style>
</head>
<body class="text-white font-sans relative">
    
    <div class="overlay"></div>

    <nav class="bg-blue-900 bg-opacity-75 fixed top-0 left-0 w-full z-10 shadow-lg">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Shelby's Hospital</h1>
            <div class="flex space-x-4">
                <button onclick="navigate('dashboard')" class="hover:text-blue-300">Dashboard</button>
                <button onclick="navigate('patient-details')" class="hover:text-blue-300">Patient Details</button>
                <button onclick="navigate('reports')" class="hover:text-blue-300">Reports</button>
                <button onclick="navigate('billing')" class="hover:text-blue-300">Billing</button>
                <button onclick="navigate('login')" class="hover:text-blue-300">Login</button>
            </div>
        </div>
    </nav>

    <div class="container mx-auto pt-20 px-4 space-y-8">
        <!-- Dashboard Section -->
<section id="dashboard" class="fade-in active bg-white bg-opacity-90 rounded-lg shadow-lg p-6 space-y-8">
    <!-- Welcome Section -->
    <div class="text-center">
        <h2 class="text-4xl font-bold text-blue-700">Welcome to Our Hospital</h2>
        <p class="text-gray-700 mt-4">Providing quality healthcare services with excellence and compassion.</p>
    </div>

    <!-- About Us -->
    <div class="space-y-4">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
            <!-- Image Slider -->
            <div class="w-1/2">
                <div class="relative">
                  <div class="slider relative overflow-hidden rounded-lg shadow-lg">
                    <div class="slides">
                      <img src="https://cdn.britannica.com/12/130512-004-AD0A7CA4/campus-Riverside-Ottawa-The-Hospital-Ont.jpg" alt="Hospital 1" class="w-full h-auto transition-opacity duration-1000">
                      <img src="https://th.bing.com/th/id/OIP.QH-tTdcP8qZQyZl1aBJ1zwHaE8?w=268&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Hospital 2" class="w-full h-auto transition-opacity duration-1000 opacity-0">
                      <img src="https://th.bing.com/th/id/OIP.mxThbd3rn7TSz1y0WPl8SQHaE8?w=268&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Hospital 3" class="w-full h-auto transition-opacity duration-1000 opacity-0">
                    </div>
                  </div>
                </div>
              </div>
      
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  const slides = document.querySelectorAll(".slides img");
                  let currentSlide = 0;
      
                  setInterval(() => {
                    slides[currentSlide].classList.add("opacity-0");
                    currentSlide = (currentSlide + 1) % slides.length;
                    slides[currentSlide].classList.remove("opacity-0");
                  }, 3000);
                });
              </script>
      

            <!-- About Us Text -->
            <div>
                <h3 class="text-3xl font-semibold text-blue-700">About Us</h3>
                <p class="text-gray-700">
                    Our hospital has been a pioneer in providing world-class healthcare facilities to the community.
                    With highly experienced doctors, cutting-edge technology, and patient-focused care, we ensure your
                    well-being. Our mission is to deliver exceptional medical services while prioritizing the comfort
                    and satisfaction of our patients. We are committed to innovation, compassion, and excellence in
                    every aspect of healthcare.
                </p>
            </div>
        </div>
    </div>
    <!-- Our Services -->
    <div class="space-y-4">
        <h3 class="text-3xl font-semibold text-blue-700">Our Services</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition">
                <h4 class="text-xl font-semibold text-blue-600">Emergency Care</h4>
                <p class="text-gray-700 mt-2">24/7 emergency services with state-of-the-art facilities and trained staff.</p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition">
                <h4 class="text-xl font-semibold text-blue-600">Outpatient Services</h4>
                <p class="text-gray-700 mt-2">Comprehensive outpatient services for diagnosis, consultation, and treatment.</p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition">
                <h4 class="text-xl font-semibold text-blue-600">Surgical Services</h4>
                <p class="text-gray-700 mt-2">Advanced surgical procedures performed by expert surgeons.</p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition">
                <h4 class="text-xl font-semibold text-blue-600">Pharmacy</h4>
                <p class="text-gray-700 mt-2">On-site pharmacy to ensure quick access to prescribed medications.</p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition">
                <h4 class="text-xl font-semibold text-blue-600">Diagnostic Labs</h4>
                <p class="text-gray-700 mt-2">Accurate and reliable diagnostic tests with modern equipment.</p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition">
                <h4 class="text-xl font-semibold text-blue-600">Maternity Services</h4>
                <p class="text-gray-700 mt-2">Comprehensive maternity care for a safe and comfortable experience.</p>
            </div>
        </div>
    </div>

    <!-- About Doctors -->
    <div class="space-y-4">
        <h3 class="text-3xl font-semibold text-blue-700">Our Doctors</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThM3Z6jh_3tG2TvFigBIhYnapVqQ800hWUqw&s" alt="Doctor 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-xl font-bold text-blue-600">Dr. Hari Prasad Gotamey</h4>
                    <p class="text-gray-700">Cardiologist</p>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ63WdsTMcDKjdDQCkQaS1LBrer0DpqHxqX6Q&s" alt="Doctor 2" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-xl font-bold text-blue-600">Dr. Fulkumari Waiba</h4>
                    <p class="text-gray-700">Orthopedic Surgeon</p>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://as2.ftcdn.net/v2/jpg/02/82/72/13/1000_F_282721311_yyx96CWXbXsy2XVOFAjZ6jFm8vZrZKjO.jpg" alt="Doctor 3" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-xl font-bold text-blue-600">Dr. Champa Chameli Waiba</h4>
                    <p class="text-gray-700">Pediatrician</p>
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-4">
        <h3 class="text-3xl font-semibold text-blue-700">Message from the Chairperson and Board Members</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Chairperson -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/473140361_1273503660568194_4393997103878642751_n.jpg?stp=dst-jpg_p480x480_tt6&_nc_cat=109&ccb=1-7&_nc_sid=0024fc&_nc_ohc=jycYUhPABvUQ7kNvgHhVvnx&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&_nc_ht=scontent.xx&oh=03_Q7cD1gFKJBJC0S9d18bajkEwkjRlcCeowNYw3j3uKDr1_daiAg&oe=67B156FC" alt="Chairperson" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-xl font-bold text-blue-600">Kashyap Khanal</h4>
                    <p class="text-gray-700">As Chairperson, I am honored to lead our mission to provide exceptional healthcare services. Together, we strive for innovation and excellence in patient care.</p>
                </div>
            </div>
            <!-- Board Member 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/462572752_792552279682340_8767173625168724048_n.png?stp=dst-png_s640x640&_nc_cat=110&ccb=1-7&_nc_sid=0024fc&_nc_ohc=YzGAvqWLn14Q7kNvgFGoyh7&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&_nc_ht=scontent.xx&oh=03_Q7cD1gGYHtXsPIPp4LcpspJOfMkmjqWLzxoS5aRkRKX9eDhP2g&oe=67B15230" alt="Ronjal Adhikari" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-xl font-bold text-blue-600">Ronjal Adhikari</h4>
                    <p class="text-gray-700">Our commitment is to advance healthcare accessibility and quality for every individual in our community.</p>
                </div>
            </div>
            <!-- Board Member 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/472889984_1132958104994805_4907043859056432076_n.jpg?stp=dst-jpg_s640x640_tt6&_nc_cat=104&ccb=1-7&_nc_sid=0024fc&_nc_ohc=KFmtQ5iEQdcQ7kNvgFm8K4O&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&_nc_ht=scontent.xx&oh=03_Q7cD1gHERFHRT-esuybzOqbVhRlV9X1A1uZQT4ThqdgeiEWj4Q&oe=67B14F80" alt="Tika Datta Dhamala" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-xl font-bold text-blue-600">Tika Datta Dhamala</h4>
                    <p class="text-gray-700">Dedicated to ensuring every patient receives compassionate, comprehensive, and cutting-edge care.</p>
                </div>
            </div>
            <!-- Board Member 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="image/bunny3.jpg" alt="Nirajan Chaudhary" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-xl font-bold text-blue-600">Nirajan Chaudhary</h4>
                    <p class="text-gray-700">Committed to upholding our values of integrity, innovation, and excellence in healthcare services.</p>
                </div>
            </div>
        </div>
    </div>


<!-- Doctors' Directory Section -->
<div class="space-y-4">
    <h3 class="text-3xl font-semibold text-blue-700">Doctors' Directory</h3>
    <div class="relative">
        <input type="text" placeholder="Search by Name or Specialty" class="w-full px-4 py-2 border rounded mb-4 text-blue-600">
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThM3Z6jh_3tG2TvFigBIhYnapVqQ800hWUqw&s" alt="Doctor 1" class="w-full h-48 object-cover">
            <div class="p-4">
                <h4 class="text-xl font-bold text-blue-600">Dr. Hari Prasad Gotamey</h4>
                <p class="text-gray-700">Cardiologist</p>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ63WdsTMcDKjdDQCkQaS1LBrer0DpqHxqX6Q&s" alt="Doctor 2" class="w-full h-48 object-cover">
            <div class="p-4">
                <h4 class="text-xl font-bold text-blue-600">Dr. Fulkumari Waiba</h4>
                <p class="text-gray-700">Orthopedic Surgeon</p>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition">
            <img src="https://as2.ftcdn.net/v2/jpg/02/82/72/13/1000_F_282721311_yyx96CWXbXsy2XVOFAjZ6jFm8vZrZKjO.jpg" alt="Doctor 3" class="w-full h-48 object-cover">
            <div class="p-4">
                <h4 class="text-xl font-bold text-blue-600">Dr. Champa Chameli Waiba</h4>
                <p class="text-gray-700">Pediatrician</p>
            </div>
        </div>
    </div>
</div>

<!-- News & Updates Section -->
<div class="space-y-4">
    <h3 class="text-3xl font-semibold text-blue-700">News & Updates</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="https://precisionendodonticswny.com/wp-content/uploads/2018/03/endodontic-surgeries-buffalo-root-canal-specialist-1024x1024.jpg" alt="News 1" class="w-full h-48 object-cover">
            <div class="p-4">
                <h4 class="text-xl font-bold text-blue-600">State-of-the-Art Equipment Introduced</h4>
                <p class="text-gray-700">Our hospital now features the latest technology in diagnostic imaging.</p>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="https://th.bing.com/th/id/OIP.tcYGd5NsnzPiaGG1rQaG-QHaDt?rs=1&pid=ImgDetMain" alt="News 2" class="w-full h-48 object-cover">
            <div class="p-4">
                <h4 class="text-xl font-bold text-blue-600">Free Health Camp for the Community</h4>
                <p class="text-gray-700">Join us for our upcoming free health camp this weekend.</p>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="https://th.bing.com/th/id/OIP.eoKzeXkycaoWGmieXA3tJQHaE6?rs=1&pid=ImgDetMain" alt="News 3" class="w-full h-48 object-cover">
            <div class="p-4">
                <h4 class="text-xl font-bold text-blue-600">Award for Excellence in Patient Care</h4>
                <p class="text-gray-700">Our hospital has been recognized for outstanding patient services.</p>
            </div>
        </div>
    </div>
</div>



</section>
<footer class="footer" style="background: rgba(0, 0, 139, 0.7); text-align: center; color: white; padding: 10px;">
    Further more details, visit M17
</footer>

<!-- patient details -->

        <section id="patient-details" class="fade-in hidden bg-white bg-opacity-90 rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-3xl font-bold text-blue-700">Patient Details</h2>
                <button onclick="showPatientForm()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Add Patient</button>
            </div>
            <form action="patient.php" method="post" id="patient-form" class="hidden bg-gray-100 p-4 rounded-lg shadow-lg mb-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="number" id="patient-id" placeholder="Id" name="id" class="w-full px-4 py-2 border rounded" style="color : green" >
                    <input type="text" id="patient-name" placeholder="Name" name="name" class="w-full px-4 py-2 border rounded" style="color : green">
                    <input type="number" id="patient-age" placeholder="Age" name="age"class="w-full px-4 py-2 border rounded" style="color : green">
                    <input type="text" id="patient-contact" placeholder="Contact" name="contact" class="w-full px-4 py-2 border rounded" style="color : green">
                </div>
                <button type="submit" onclick="addPatient()" class="mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Save</button>
            </form>
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-blue-700 text-white">
                    <tr>
                        <th class="px-4 py-2">Id</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Age</th>
                        <th class="px-4 py-2">Contact</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
         
                </thead>
                <tbody id="patient-table" class="text-gray-700">
                </tbody>
            </table>
        </section>

        <!-- Reports Section -->
<section id="reports" class="fade-in hidden bg-white bg-opacity-90 rounded-lg shadow-lg p-6 space-y-8 text-blue-600">
    <div class="text-center">
        <h2 class="text-4xl font-bold text-blue-700">Patient Reports</h2>
        <p class="text-gray-700 mt-4">View and manage all patient medical reports efficiently.</p>
    </div>

    <!-- Search and Filter -->
    <div class="flex flex-wrap justify-between items-center space-y-4 md:space-y-0">
        <input
            type="text"
            id="searchReports"
            placeholder="Search by Patient Name or Report ID"
            class="w-full md:w-1/3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        <select
            id="filterReports"
            class="w-full md:w-1/3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-600"
        >
            <option value="">Filter by Status</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
        <button
            id="downloadReports"
            class="w-full md:w-auto bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition"
        >
            Download All Reports
        </button>
    </div>
    <!-- <section id="report-details" class="fade-in hidden bg-white bg-opacity-90 rounded-lg shadow-lg p-6"> -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-3xl font-bold text-blue-700">Report Details</h2>
                <button onclick="showReportForm()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Add Report</button>
            </div>

    <!-- Reports Table -->
     <form action="report.php" method="POST" id="report_form">
     <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
     
                    <!-- <input type="number" id="id" placeholder="#" name="id" class="w-full px-4 py-2 border rounded"> -->
                    <input type="number" id="report_id" placeholder="Report Id" name="report_id" class="w-full px-4 py-2 border rounded">
                    <input type="text" id="patient_name" placeholder="Patient Name" name="patient_name"class="w-full px-4 py-2 border rounded">
                    <input type="date" id="date" placeholder="Date" name="date"class="w-full px-4 py-2 border rounded">
                    <input type="text" id="doctors" placeholder="Doctors" name="doctors" class="w-full px-4 py-2 border rounded">
                    <input type="text" id="status" placeholder="Status" name="status" class="w-full px-4 py-2 border rounded">
                </div>
                <button type="submit" onclick="addReport()"  class="mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Save</button>

     <div class="overflow-x-auto mt-6">
        
    </div>

     </form>
     <table class="table-auto w-full text-left border-collapse border border-gray-300">
            <thead>
                <tr class="bg-blue-100 text-blue-700">
                    <!-- <th class="p-3 border border-gray-300">#</th> -->
                    <th class="p-3 border border-gray-300">Report ID</th>
                    <th class="p-3 border border-gray-300">Patient Name</th>
                    <th class="p-3 border border-gray-300">Date</th>
                    <th class="p-3 border border-gray-300">Doctor</th>
                    <th class="p-3 border border-gray-300">Status</th>
                    <th class="p-3 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody id="reportRows">
                
            </tbody>
        </table>
   
    <!-- Add New Report Button -->
    <!-- <div class="text-right">
        <button
            id="addReport"
            class="bg-yellow-600 text-red-600 px-6 py-3 rounded-lg hover:bg-green-700 transition";>
        Add New Report</button>
    </div> -->
</section> 


        <!-- Billing Section -->
<section id="billing" class="fade-in hidden bg-white bg-opacity-90 rounded-lg shadow-lg p-6 space-y-8">
    <!-- Title -->
    <div class="text-center">
        <h2 class="text-4xl font-bold text-blue-700">Billing Details</h2>
        <p class="text-gray-700 mt-4">Manage patient invoices and payment details efficiently.</p>
    </div>

    <!-- Add New Invoice Button -->
    <div class="text-right">
        <button
            id="addInvoice"
            class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition"
        >
            <!-- Add New Invoice -->
        </button>
    </div>

    <!-- Billing Table -->
    <div class="overflow-x-auto mt-6">
        <table class="table-auto w-full text-left border-collapse border border-gray-300">
            <thead>
                <tr class="bg-blue-100 text-blue-700">
                    <th class="p-3 border border-gray-300">#</th>
                    <th class="p-3 border border-gray-300">Invoice ID</th>
                    <th class="p-3 border border-gray-300">Patient Name</th>
                    <th class="p-3 border border-gray-300">Date</th>
                    <th class="p-3 border border-gray-300">Total Amount</th>
                    <th class="p-3 border border-gray-300">Paid</th>
                    <th class="p-3 border border-gray-300">Balance</th>
                    <th class="p-3 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody id="billingRows">
                <!-- Dynamic Rows -->
                <tr class="hover:bg-gray-100 transition">
                    <td class="p-3 border border-gray-300 text-blue-600">1</td>
                    <td class="p-3 border border-gray-300 text-blue-600">INV001</td>
                    <td class="p-3 border border-gray-300 text-blue-600">John Doe</td>
                    <td class="p-3 border border-gray-300 text-blue-600">2025-01-10</td>
                    <td class="p-3 border border-gray-300 text-blue-600">$500</td>
                    <td class="p-3 border border-gray-300 text-blue-600">$300</td>
                    <td class="p-3 border border-gray-300 text-blue-600">$200</td>
                    <td class="p-3 border border-gray-300">
                        <button class="text-blue-600 hover:underline edit-invoice" data-id="INV001">Edit</button> |
                        <button class="text-red-600 hover:underline delete-invoice" data-id="INV001">Delete</button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 transition">
                    <td class="p-3 border border-gray-700 text-blue-600">2</td>
                    <td class="p-3 border border-gray-700 text-blue-600">INV002</td>
                    <td class="p-3 border border-gray-700 text-blue-600">Jane Smith</td>
                    <td class="p-3 border border-gray-700 text-blue-600">2025-01-09</td>
                    <td class="p-3 border border-gray-700 text-blue-600">$700</td>
                    <td class="p-3 border border-gray-700 text-blue-600">$700</td>
                    <td class="p-3 border border-gray-700 text-blue-600">$0</td>
                    <td class="p-3 border border-gray-700 text-blue-600">
                        <button class="text-blue-600 hover:underline edit-invoice" data-id="INV002">Edit</button> |
                        <button class="text-red-600 hover:underline delete-invoice" data-id="INV002">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Summary Section -->
    <div class="mt-8 space-y-4">
        <h3 class="text-2xl font-bold text-blue-700">Billing Summary</h3>
        <div class="flex flex-wrap justify-between items-center">
            <div class="w-full md:w-1/3 p-4 bg-blue-100 rounded-lg shadow">
                <h4 class="text-xl font-semibold text-blue-600">Total Invoices</h4>
                <p class="text-gray-700 text-2xl font-bold" id="totalInvoices">2</p>
            </div>
            <div class="w-full md:w-1/3 p-4 bg-green-100 rounded-lg shadow">
                <h4 class="text-xl font-semibold text-green-600">Total Collected</h4>
                <p class="text-gray-700 text-2xl font-bold" id="totalCollected">$1000</p>
            </div>
            <div class="w-full md:w-1/3 p-4 bg-yellow-100 rounded-lg shadow">
                <h4 class="text-xl font-semibold text-yellow-600">Total Balance</h4>
                <p class="text-gray-700 text-2xl font-bold" id="totalBalance">$200</p>
            </div>
        </div>
    </div>
</section>


        <section id="login" class="fade-in hidden bg-white bg-opacity-90 rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold text-blue-700">Login</h2>
            <form action="sign_up.php" method="post" id="sign_up-form" class="mt-4"  >
                <input type="email" placeholder="Email" class="w-full px-4 py-2 border rounded mb-4">
                <input type="password" placeholder="Password" class="w-full px-4 py-2 border rounded mb-4">
                <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Login</button>
            </form>
        </section>
    </div>

    <!-- <footer class="footer" ><p class="text-gray-700 mt-4">further more details visit M17</p></footer> -->
   

    
   

    <script>
        const sections = document.querySelectorAll('section');

        function navigate(sectionId) {
            sections.forEach(section => {
                section.classList.add('hidden');
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.remove('hidden');
            document.getElementById(sectionId).classList.add('active');
        }

        function showPatientForm() {
            document.getElementById('patient-form').classList.toggle('hidden');
        }

        function addPatient() {
            const name = document.getElementById('patient-name').value;
            const age = document.getElementById('patient-age').value;
            const contact = document.getElementById('patient-contact').value;

            const table = document.getElementById('patient-table');
            const row = document.createElement('tr');

            row.innerHTML = `
                <td class="border px-4 py-2">${id}</td>
                <td class="border px-4 py-2">${name}</td>
                <td class="border px-4 py-2">${age}</td>
                <td class="border px-4 py-2">${contact}</td>
                <td class="border px-4 py-2">
                    <button class="bg-yellow-500 px-2 py-1 text-white rounded">Edit</button>
                    <button class="bg-red-600 px-2 py-1 text-white rounded" onclick="deleteRow(this)">Delete</button>
                </td>
            `;

            table.appendChild(row);

            document.getElementById('patient-form').reset();
        }

        function deleteRow(btn) {
            btn.parentElement.parentElement.remove();
        }
        
        // reports
        function showReportForm() {
            document.getElementById('report_form').classList.toggle('hidden');
            // document.getElementById('report_form').classList.remove('hidden');

        }
        function addReport() {
    const id = document.getElementById('id').value;
    const report_id = document.getElementById('report_id').value;
    const patient_name = document.getElementById('patient_name').value;
    const date = document.getElementById('date').value;
    const doctors = document.getElementById('doctors').value;
    const status = document.getElementById('status').value;

    if (!report_id || !patient_name || !date || !doctors || !status) {
        alert("Please fill all fields before submitting.");
        return;
    }

    const table = document.getElementById('reportRows');
    const row = document.createElement('tr');

    row.innerHTML = `
      
        <td class="border px-4 py-2">${report_id}</td>
        <td class="border px-4 py-2">${patient_name}</td>
        <td class="border px-4 py-2">${date}</td>
        <td class="border px-4 py-2">${doctors}</td>
        <td class="border px-4 py-2">${status}</td>
        <td class="border px-4 py-2">
            <button class="bg-yellow-500 px-2 py-1 text-white rounded">Edit</button>
            <button class="bg-red-600 px-2 py-1 text-white rounded" onclick="deleteRow(this)">Delete</button>
        </td>
    `;

    table.appendChild(row);
    document.getElementById('report_form').reset();
}

function deleteRow(btn) {
    btn.parentElement.parentElement.remove();
}

    </script>
</body>
</html>