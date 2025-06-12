<section class="bg-white relative">
    <!-- Slider container -->
    <div class="relative h-[600px] overflow-hidden">
        <!-- Slider images -->
        <div class="flex transition-transform duration-500 h-full" id="slider">
            <?php include('hero-sec/chatbot.php'); ?>
            <?php include('hero-sec/img-clas.php'); ?>
            <?php include('hero-sec/obj-det.php'); ?>
            <?php include('hero-sec/urgensi.php'); ?>




        </div>
        <a href="www.google.com" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
            Get starteeeed
            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-900 focus:ring-4 focus:ring-gray-100">
            Learn more
        </a>
    </div>


    <!-- Slider controls -->
    <button type="button" class="absolute top-1/2 left-4 transform -translate-y-1/2 z-10 bg-white/30 hover:bg-white/50 rounded-full p-2 text-white" onclick="moveSlide(-1)">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>
    <button type="button" class="absolute top-1/2 right-4 transform -translate-y-1/2 z-10 bg-white/30 hover:bg-white/50 rounded-full p-2 text-white" onclick="moveSlide(1)">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>

    <!-- Pagination dots -->
    <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" onclick="goToSlide(0)"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" onclick="goToSlide(1)"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" onclick="goToSlide(2)"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" onclick="goToSlide(3)"></button>
    </div>


    <!-- Slider JavaScript -->
    <script>
        let currentSlide = 0;
        const slider = document.getElementById('slider');
        const slides = document.querySelectorAll('#slider > div').length;
        const dots = document.querySelectorAll('.bottom-5 button');

        function updateSlider() {
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            // Update pagination dots
            dots.forEach((dot, index) => {
                dot.classList.toggle('bg-white', index === currentSlide);
                dot.classList.toggle('bg-white/50', index !== currentSlide);
            });
        }

        function moveSlide(direction) {
            currentSlide = (currentSlide + direction + slides) % slides;
            updateSlider();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlider();
        }

        // Auto-advance slides
        setInterval(() => moveSlide(1), 5000);

        // Initialize first dot as active
        updateSlider();
    </script>
</section>