<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Detail - Digital Banking Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50">
    <?php include(APPPATH . 'Views/landing-page/navbar.php'); ?>

    <main class="pt-20 pb-16 lg:pt-24 lg:pb-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue">
                <!-- Article Header -->
                <header class="mb-4 lg:mb-6">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                            <img class="mr-4 w-16 h-16 rounded-full" src="<?= base_url('assets/img/author.jpg') ?>" alt="Author">
                            <div>
                                <a href="#" class="text-xl font-bold text-gray-900">John Doe</a>
                                <p class="text-base text-gray-500">Digital Banking Expert</p>
                                <p class="text-base text-gray-500"><time datetime="2023-12-15">Dec. 15, 2023</time></p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">The Future of Digital Banking: Trends and Innovations</h1>
                </header>

                <!-- Featured Image -->
                <figure class="mb-8">
                    <img src="<?= base_url('assets/img/featured-article.jpg') ?>" class="w-full rounded-lg" alt="Featured Image">
                    <figcaption class="mt-2 text-sm text-center text-gray-500">Digital banking transformation illustration</figcaption>
                </figure>

                <!-- Article Content -->
                <div class="prose max-w-none">
                    <p class="lead">The banking industry is undergoing a dramatic transformation, driven by technological innovation and changing consumer expectations. In this article, we'll explore the latest trends and innovations shaping the future of digital banking.</p>
                    
                    <h2>The Rise of Digital-First Banking</h2>
                    <p>Digital-first banking is no longer just a convenience—it's becoming the primary way people manage their finances. Traditional banks are racing to modernize their services, while new fintech companies are disrupting the industry with innovative solutions.</p>

                    <h2>Key Innovations in Digital Banking</h2>
                    <ul>
                        <li>Artificial Intelligence and Machine Learning</li>
                        <li>Blockchain Technology</li>
                        <li>Open Banking APIs</li>
                        <li>Mobile-First Solutions</li>
                        <li>Biometric Authentication</li>
                    </ul>

                    <h2>The Impact on Customer Experience</h2>
                    <p>These innovations are fundamentally changing how customers interact with their banks. From instant payments to personalized financial advice, the focus is on creating seamless, intuitive experiences that meet modern consumers' needs.</p>

                    <blockquote>
                        <p>"The future of banking is not just digital—it's intelligent, personalized, and seamlessly integrated into our daily lives."</p>
                    </blockquote>

                    <h2>Security Considerations</h2>
                    <p>As banking becomes increasingly digital, security remains a top priority. Banks are implementing advanced security measures while ensuring user experience remains smooth and intuitive.</p>

                    <h2>Looking Ahead</h2>
                    <p>The pace of innovation in digital banking shows no signs of slowing. As technology continues to evolve, we can expect even more revolutionary changes in how we manage our money.</p>
                </div>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mt-8">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Digital Banking</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Innovation</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Technology</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Future Trends</span>
                </div>

                <!-- Share Buttons -->
                <div class="flex items-center gap-4 mt-8">
                    <span class="text-sm font-medium text-gray-900">Share this article:</span>
                    <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="fab fa-twitter mr-2"></i>Twitter
                    </button>
                    <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="fab fa-linkedin mr-2"></i>LinkedIn
                    </button>
                </div>
            </article>
        </div>
    </main>

    <?php include(APPPATH . 'Views/landing-page/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>