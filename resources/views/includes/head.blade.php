<meta charset="utf-8">
<meta name="description" content="">
<meta name="Saquib" content="Blade">
<title>Checkout our layout</title>
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/brands.min.css" integrity="sha512-nS1/hdh2b0U8SeA8tlo7QblY6rY6C+MgkZIeRzJQQvMsFfMQFUKp+cgMN2Uuy+OtbQ4RoLMIlO2iF7bIEY3Oyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/daisyui@2.27.0/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com/%22%3E"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/5d54a13ffa.js" crossorigin="anonymous"></script>
<script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>