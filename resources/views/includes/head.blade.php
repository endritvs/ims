<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>IMS Dashboard</title>
    <!--     Dark Mode Refresh remover     -->
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    {{-- CSS TAILWIND --}}
    {{-- <link rel="stylesheet" href="./assets/css/app.css"> --}}
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    {{-- Global styling --}}
    <link href="./assets/css/global.css" rel="stylesheet"  />



<!-- Main Styling -->
    <link href="./assets/css/argon-dashboard-tailwind.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/brands.min.css" integrity="sha512-nS1/hdh2b0U8SeA8tlo7QblY6rY6C+MgkZIeRzJQQvMsFfMQFUKp+cgMN2Uuy+OtbQ4RoLMIlO2iF7bIEY3Oyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--   Core JS Files   -->
    <!-- plugin for charts  -->
    <script src="./assets/js/plugins/chartjs.min.js" async></script>
    <!-- plugin for scrollbar  -->
    <script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script>
    
    {{-- <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script> --}}
    {{-- <script src="https://cdn.tailwindcss.com/%22%3E"></script> --}}

    <!-- main script file  -->
    <script src="./assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</head>