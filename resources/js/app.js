import './bootstrap';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

// Initialize Flatpickr
document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#datePicker", {
        minDate: "today", // Disable past dates
        dateFormat: "Y-m-d",
    });
});
