 <footer class="relative w-full bg-indigo-400">
     <div class="container mx-auto pt-6">
         <div class="mb-2 grid grid-cols-1 gap-4 md:grid-cols-4 md:gap-6 lg:grid-cols-6 lg:gap-8">
             <!-- Brand section -->
             <div class="col-span-1 px-2 md:col-start-1 md:col-end-3 lg:col-start-1 lg:col-end-3 lg:px-0">
                 <p class="mb-2 px-1 text-start text-sm text-black">
                     সরকারি ও বেসরকারি অফিসের তথ্য, জরুরি সেবা</p>
                 <p class="mb-4 px-1 text-start text-sm text-black">
                     চাকরির বিজ্ঞপ্তি,সর্বশেষ ঘোষণা ও</p>
                 <p class="text-sm text-black md:mb-0">
                     &copy; 2025. শিক্ষা ও স্বাস্থ্য.
                 </p>
                 <div class="mt-2 flex space-x-6 md:mt-3 lg:mt-4">
                     <a class="text-black transition-colors duration-300 hover:text-black"
                         href="https://www.facebook.com/beautifultrishalweb">
                         <i class="fab fa-facebook-f text-lg"></i>
                     </a>
                     {{-- <a class="text-black transition-colors duration-300 hover:text-black"
                            href="https://www.facebook.com/beautifultrishalweb">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a> --}}
                     <a class="text-black transition-colors duration-300 hover:text-black"
                         href="https://www.youtube.com/@beautifultrishalweb">
                         <i class="fab fa-youtube text-lg"></i>
                     </a>
                     <a class="text-black transition-colors duration-300 hover:text-black"
                         href="mailto:beautifultrishal4@gmail.com">
                         <i class="fa-solid fa-envelope text-lg"></i>
                     </a>
                     {{-- <a class="text-black transition-colors duration-300 hover:text-black" href="#">
                            <i class="fab fa-linkedin-in text-lg"></i>
                        </a> --}}
                 </div>
             </div>

             <!-- Contact -->
             <div class="col-span-1 px-2 md:col-start-1 md:col-end-3 lg:col-span-2 lg:col-end-7">
                 <h3 class="text-md mb-3 font-semibold text-black">যোগাযোগ</h3>
                 <ul class="space-y-3">
                     <li class="flex items-center">
                         <i class="fas fa-phone mr-3 text-black"></i>
                         <span class="text-black">
                             <a href="tel:+88 02 333356226">হেল্পলাইনঃ +880 1** **** ****</a></span>
                     </li>
                     <li class="flex items-center">
                         <i class="fas fa-envelope mr-3 text-black"></i>
                         <span class="text-black"><a href="mailto:beautifultrishal4@gmail.com">ইমেইল:
                                 beautifultrishal4@gmail.com</a></span>
                     </li>
                 </ul>
             </div>
         </div>
     </div>

 </footer>

 @if (Route::has('login'))
     <div class="h-14.5 hidden lg:block"></div>
 @endif
 </body>

 </html>


 <script>
     // Scroll to top functionality, hide if already at top
     const scrollToTopBtn = document.getElementById("scroll-to-top");
     window.addEventListener("scroll", () => {
         if (window.scrollY > 300) {
             scrollToTopBtn.style.display = "block";
             scrollToTopBtn.style.animation = "fadeIn 0.3s";
         } else {
             scrollToTopBtn.style.animation = "fadeOut 0.3s";
             scrollToTopBtn.style.display = "none";
         }
     });
     scrollToTopBtn.addEventListener("click", () => {
         window.scrollTo({
             top: 0,
             behavior: "smooth",
         });
     });
 </script>
