@extends('layouts.app')

@section('content')
    
    <section id="about_main">
      <div class="row container">
  
        <h3 id="about_title" data-aos="fade-up">About the Center for Holistic Health Care</h3>

        <div class="col s12 " data-aos="fade-up">
          <div class="card horizontal">
              <div class="card-content" style="min-width:100%">
                <img
                  src="/storage/img/fr.jpg"
                  id="about_image"
                  height="200px"
                  width="200px"
                />
                      <div class="col s12 " id="Block" style="height:100px;"></div>
                      <div class="col s12" id="content_title" style="margin-bottom:3rem">
                        <h5>
                          Fr. Salvatore Carzedda, PIME
                        </h5>
                        <h6>  
                            ( who remains an inspiration for Silsilah in the spirit of
                            “Padayon” (Move on)”)
                        </h6>
                    
                      </div>
                <p>
                  The Center for Holistic Health Care (CHHC) in Harmony Village
                  was inaugurated on May 20, 2010. “ We owe great thanks to
                  Mondo Unito and several friends in Italy for the realization
                  of this project. We dedicate this project to the memory of Fr.
                  Salvatore Carzedda, PIME, who remains an inspiration for
                  Silsilah in the spirit of “Padayon” (Move on)” , said Fr.
                  Sebastiano D’Ambra, PIME. Fr. Salvatore and Fr. Sebastiano
                  came to the Philippines together in 1974 and were in the same
                  mission assignment in Siocon, Zamboanga del Norte. Fr.
                  Salvatore was shot and killed on May 20, 1992.
                </p>
                <br>
                <p>
                  Fr. Sebastiano also acknowledges help from within the
                  Philippines when he said , “ We are also grateful to the many
                  friends among doctors and others who have expressed the wish
                  to offer voluntary service to the people through the CHHC.”
                  The CHHC is one more expression of care in Silsilah’s mission
                  to build a Culture of Dialogue, Path to Peace in our society.
                  The brochure for the CHHC says:
                </p>
                <br>

                <p>
                  The CHHC will promote a holistic, preventive approach to basic
                  health care. It will seek to promote healthy diet and the
                  healing properties ofHerbs and other naturally occurring
                  plants which have been validated by research. This philosophy
                  of health will be promoted through training and health
                  services. In special cases of ailments and traumas effort will
                  be made to harmonize physical, spiritual and psychological
                  impacts.
                </p>
                <br>

                <p>
                  Expressing his hope for the success of the CHHC Fr. Sebastiano
                  said “May this new project of Silsilah be a model of an
                  innovative approach to holistic health care and an inspiration
                  for many to extend help. Many of our brothers and sisters need
                  care … and we can help even if only through a smile or a
                  listening and caring heart.”
                </p>
              </div>
          </div>
        </div>
      </div>
    </section>
    @endsection

    <script src="js/materialize.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, { responsiveThreshold: 1 });
      });
    </script>

  </body>
</html>
