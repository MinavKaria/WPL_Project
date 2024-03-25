document.addEventListener('DOMContentLoaded', function () {
    const jobs = [
      {
        title: 'Web Developer',
        location: 'Cape Town',
        type: 'full-time',
        skills: ['html', 'css', 'javascript'],
        description: 'Join our team as a Web Developer and contribute to building exciting web applications using the latest technologies.'
      },
      {
        title: 'Data Analyst',
        location: 'Pretoria',
        type: 'full-time',
        skills: ['data-analysis', 'statistics', 'sql'],
        description: 'We are looking for a skilled Data Analyst to join our team. You will analyze data to help improve our company\'s efficiency and performance.'
      },
      {
        title: 'Junior Assistant',
        location: 'Remote',
        type: 'part-time',
        skills: ['communication', 'organization'],
        description: 'We are seeking a Junior Assistant to support our team with administrative tasks. This is a great opportunity to gain valuable experience.'
      },
      {
        title: 'Assistant',
        location: 'Cape Town',
        type: 'contract',
        skills: ['management', 'leadership', 'communication'],
        description: 'We are hiring an Assistant to provide high-level support to our executives. This role requires strong organizational and communication skills.'
      }
    ];
  
    const filterLocation = document.getElementById('filter-location');
    const filterJobType = document.getElementById('filter-job-type');
    const filterSkillHTML = document.getElementById('filter-skill-html');
    const filterSkillCSS = document.getElementById('filter-skill-css');
    const filterSkillJS = document.getElementById('filter-skill-javascript');
    const featuredJobs = document.getElementById('featured-jobs');
  
    function renderJobs(jobs) {
      featuredJobs.innerHTML = '';
      jobs.forEach(job => {
        const jobCard = document.createElement('div');
        jobCard.classList.add('col');
        jobCard.innerHTML = `
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">${job.title}</h5>
              <p class="card-text">Location: ${job.location}</p>
              <p class="card-text">Type: ${job.type}</p>
              <p class="card-text">${job.description}</p>
            </div>
          </div>
        `;
        featuredJobs.appendChild(jobCard);
      });
    }
  
    function applyFilters() {
      let filteredJobs = jobs.filter(job => {
        const locationFilter = filterLocation.value === 'all' || job.location === filterLocation.value;
        const jobTypeFilter = filterJobType.value === 'all' || job.type === filterJobType.value;
        const htmlSkillFilter = !filterSkillHTML.checked || job.skills.includes('html');
        const cssSkillFilter = !filterSkillCSS.checked || job.skills.includes('css');
        const jsSkillFilter = !filterSkillJS.checked || job.skills.includes('javascript');
        return locationFilter && jobTypeFilter && htmlSkillFilter && cssSkillFilter && jsSkillFilter;
      });
      renderJobs(filteredJobs);
    }
  
    filterLocation.addEventListener('change', applyFilters);
    filterJobType.addEventListener('change', applyFilters);
    filterSkillHTML.addEventListener('change', applyFilters);
    filterSkillCSS.addEventListener('change', applyFilters);
    filterSkillJS.addEventListener('change', applyFilters);
  
    renderJobs(jobs);
  });
  