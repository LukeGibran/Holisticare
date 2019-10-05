@extends('layouts.app')

@section('content')

    <section id="objecives_main">
      <div class="row container">
        <h3>
          Objectives
        </h3>
        <h6 style="margin-bottom:1rem;">
          The mnemonic E.A.R.T.H helps to remember the five basic objectives of
          the CHHC.They are:
        </h6>
        <ul class="collection">
          <li class="collection-item avatar">
            <i class="material-icons circle green">grade</i>
            <span class="title"><strong>Experience</strong></span>

            <p>
              To experience dialogue with creation connected to the other
              aspects of dialogue as a base to serve those who are in need, and
              as a concrete expression of dialogue as love in action and
              sometimes love in silence, attending to the health care needs of
              people with compassionate heart and skills.
            </p>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle green">grade</i>
            <span class="title"><strong>Assist</strong></span>
            <p>
              To assist those who need basic health care, giving special
              attention to preventive care and the use of natural medicines.
              Assistance will also be provided for people with illnesses of
              other categories.
            </p>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle green">grade</i>
            <span class="title"><strong>Research</strong></span>

            <p>
              To conduct research on traditional practices of medicine with a
              special attention given to herbs, plants and food. Research
              findings will be shared with other researchers to validate and
              disseminate useful information.
            </p>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle green">grade</i>
            <span class="title"><strong>Training</strong></span>

            <p>
              To train people who have the heart to serve, especially those sent
              to our modular training by barangay health centers, groups, NGOs,
              institutions. The training design will include basic health care,
              use and preparation of natural/herbal medicine, alternative
              medicine like acupuncture and other practices, spiritual
              “therapy”, including seminars on trauma healing and other forms of
              therapy.
            </p>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle green">grade</i>
            <span class="title"><strong>Harmony</strong></span>

            <p>
              To harmonize the different components: experience, assistance,
              research and training to serve people and spread this new approach
              of holistic health care as an expression of dialogue and a
              contribution toward a sustainable peace.
            </p>
          </li>
        </ul>
      </div>
    </section>
    @endsection
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, { responsiveThreshold: 1 });
      });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
