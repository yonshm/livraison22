<x-layout>
                      <div id="var" class="card my-1">
                        <div class="card-body p-0">
                        <div id="education_fields" class="my-1"></div>
                        <form>
                            <div class="row">

                            <div class="col-sm-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="Schoolname" name="Schoolname" placeholder="School Name">
                            </div>
                            </div>
                            <div class="col-sm-2">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="Age" name="Age" placeholder="Age">
                            </div>
                            </div>
                            <div class="col-sm-2">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="Degree" name="Degree" placeholder="Degree">
                            </div>
                            </div>
                            <div class="col-sm-3">
                            <div class="mb-3">
                                <select class="form-select" id="educationDate" name="educationDate">
                                <option>Date</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2023">2023</option>
                                <option value="2023">2023</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-2">
                            <div class="mb-3">
                                <button onclick="education_fields();" class="btn btn-success fw-medium" type="button">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                </button>
                            </div>
                            </div>
                            </div>
                            
                        </form>
                        </div>
                    </div>
  <!--  -->
    <div class="col-md-12">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Dynamic Form Fields</h4>
                </div>
                <div class="card-body">
                  <div id="education_fields" class="my-4"></div>
                  <form class="row">
                    <div class="col-sm-3">
                      <div class="mb-3">
                        <input type="text" class="form-control" id="Schoolname" name="Schoolname" placeholder="School Name">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="mb-3">
                        <input type="text" class="form-control" id="Age" name="Age" placeholder="Age">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="mb-3">
                        <input type="text" class="form-control" id="Degree" name="Degree" placeholder="Degree">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="mb-3">
                        <select class="form-select" id="educationDate" name="educationDate">
                          <option>Date</option>
                          <option value="2015">2015</option>
                          <option value="2016">2016</option>
                          <option value="2023">2023</option>
                          <option value="2023">2023</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="mb-3">
                        <button onclick="education_fields();" class="btn btn-success fw-medium" type="button">
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <script>


let room = 1;
function education_fields() {
  room++;
  let objTo = document.getElementById("education_fields");
  let divtest = document.createElement("div");
  divtest.setAttribute("class", "mb-3 removeclass" + room);
  let rdiv = "removeclass" + room;
  divtest.innerHTML =
    `<form class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" id="Schoolname" name="Schoolname" placeholder="School Name"></div>
            </div>
            <div class="col-sm-2"> <div class="form-group">
                <input type="text" class="form-control" id="Age" name="Age" placeholder="Age">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <input type="text" class="form-control" id="Degree" name="Degree" placeholder="Degree">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
        <select class="form-select" id="educationDate" name="educationDate">
            <option>Date</option> <option value="2015">2015</option>
            <option value="2016">2016</option> <option value="2017">2017</option>
            <option value="2018">2018</option> </select> </div></div><div class="col-sm-2">
                <div class="form-group">
                    <button class="btn btn-danger" type="button" onclick="remove_education_fields('${room}' );">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-minus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /></svg>
                    </button>
                </div>
            </div>
        </form>`;

  objTo.appendChild(divtest);
}

function remove_education_fields(rid) {
  var elements = document.querySelectorAll('.removeclass' + rid);
  elements.forEach(function(element) {
    element.remove();
  });
}
</script>
</x-layout>