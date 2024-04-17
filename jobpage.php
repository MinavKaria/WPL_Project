<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Featured Jobs</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  include 'authguard.php';
  ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h3>Filter</h3>
        <form id="search-form" action="JobFound.php" method="post">
          <select name="location" class="form-select mb-3" aria-label="Filter Jobs by Location" id="filter-location" required>
            <option value="all">All Locations</option>
            <?php
            $conn = new mysqli("localhost", "root", "", "younggigs");

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT DISTINCT location FROM jobs";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $capitalizedSkill = ucwords($row['location']);
                $lowercaseString = strtolower($row['location']);
                echo '<option value="' . $lowercaseString . '">' . $capitalizedSkill . '</option>';

              }
            }
            ?>
            <!-- <option value="mumbai">Mumbai</option>
            <option value="kolkata">Kolkata</option>
            <option value="delhi">Delhi</option>
            <option value="bangalore">Bangalore</option>
            <option value="hyderabad">Hyderabad</option>
            <option value="chennai">Chennai</option>
            <option value="pune">Pune</option>
            <option value="ahmedabad">Ahmedabad</option>
            <option value="jaipur">Jaipur</option>
            <option value="surat">Surat</option>
            <option value="lucknow">Lucknow</option>
            <option value="kanpur">Kanpur</option>
            <option value="nagpur">Nagpur</option>
            <option value="patna">Patna</option>
            <option value="indore">Indore</option>
            <option value="thane">Thane</option>
            <option value="mulund">Mulund</option>
            <option value="bhopal">Bhopal</option>
            <option value="visakhapatnam">Visakhapatnam</option>
            <option value="vadodara">Vadodara</option>
            <option value="firozabad">Firozabad</option>
            <option value="ludhiana">Ludhiana</option>
            <option value="rajkot">Rajkot</option>
            <option value="agra">Agra</option>
            <option value="siliguri">Siliguri</option>
            <option value="nashik">Nashik</option>
            <option value="faridabad">Faridabad</option>
            <option value="patiala">Patiala</option>
            <option value="meerut">Meerut</option>
            <option value="kalyan">Kalyan</option>
            <option value="vasai-virar">Vasai-Virar</option> -->
            <option value="remote">Remote</option>
          </select>
          <select name="jobType" class="form-select mb-3" aria-label="Filter Jobs by Job Type" id="filter-job-type" required>
            <option value="all">All Job Types</option>
            <option value="full-time">Full-Time</option>
            <option value="part-time">Part-Time</option>
            <option value="contract">Contract</option>
          </select>
          <div id="selected-skills-container" class="mb-3"></div>
          <label for="skills">
            Select Skills
          </label>
          <select name="skills[]" class="form-select" aria-placeholder="Select Skills" aria-label="Filter Jobs by Skills" id="filter-skills" multiple required>
            <?php
            $conn = new mysqli("localhost", "root", "", "younggigs");

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM skills";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $capitalizedSkill = ucwords($row['skill']);
                echo '<option value="' . $row['skill'] . '">' . $capitalizedSkill . '</option>';
              }
            }
            ?>
          </select>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary mt-3 w-100">Search Jobs</button>
          </div>

        </form>
      </div>
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center" id="pagination">

        </ul>
      </nav>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFOnpDpii0CWuVAy8M9D3PQQaGCz5ShROAzIqhqh1TLpCV4fEw7qQ4Txp0" crossorigin="anonymous"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var searchForm = document.getElementById('search-form');

      searchForm.addEventListener('submit', function(event) {
        // event.preventDefault();

        var searchInput = document.getElementById('search-input').value;
        var location = document.getElementById('filter-location').value;
        var jobType = document.getElementById('filter-job-type').value;
        var selectedSkills = Array.from(document.querySelectorAll('#filter-skills option:checked')).map(function(option) {
          return option.value;
        });

        var searchData = {
          searchInput: searchInput,
          location: location,
          jobType: jobType,
          skills: selectedSkills
        };

        console.log(searchData);

        // Send POST request to backend using Axios

      });

      // Initialize Select2
      $('#filter-skills').select2();

      // Handle change event for skills
      $('#filter-skills').on('change', function() {
        updateSelectedSkillsTags();
      });

      function updateSelectedSkillsTags() {
        var selectedSkillsContainer = document.getElementById('selected-skills-container');
        selectedSkillsContainer.innerHTML = '';

        var selectedSkillsData = $('#filter-skills').select2('data');

        selectedSkillsData.forEach(function(skill) {
          var tag = document.createElement('span');
          tag.className = 'badge bg-primary me-1 mb-1';
          tag.style.cursor = 'pointer';
          tag.textContent = skill.text;
          tag.addEventListener('click', function() {
            var optionToRemove = $('#filter-skills option').filter(function() {
              return $(this).html() === skill.text;
            });
            optionToRemove.prop('selected', false);
            $('#filter-skills').trigger('change.select2');
          });
          selectedSkillsContainer.appendChild(tag);
        });
      }
    });
  </script>
</body>

</html>