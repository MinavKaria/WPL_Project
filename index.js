async function animateButton() {

    // window.location.href = 'http://localhost/WPL%20%20Mini%20Project/WPL_Project/jobpage.html';
    const button = document.querySelector('.searchJobs');
    const loading = document.querySelector('.loader');
    
    button.classList.add('hidden');
    loading.classList.remove('unloading');
    loading.classList.add('loading');
    
    await setTimeout(() => {
        loading.classList.remove('loading');
        loading.classList.add('unloading');
        button.classList.remove('hidden');
        console.log("Redirecting to jobpage.html");
    }, 3000);

    // Redirect after animation is complete
   console.log("Redirecting to jobpage.html");

    
}
