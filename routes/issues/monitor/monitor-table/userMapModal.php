<div class="modal fade" id="userMapModal" tabindex="-1" aria-labelledby="userMapModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userMapModalLabel">User Map </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body relative ">
        <!-- your code here start -->
        <div class="mapController rounded d-block" style="background-color: rgba(218, 218, 218, 0.795);">

          <select class="p-1 mb-1" name="locatePropertyMap" id="mapControll">
            <option value="1" disabled selected>locate Property</option>
          </select>
          <select class="p-1 " name="locateGuardMap" id="locateGuardMap">
            <option value="1" disabled selected>locate Guard</option>
          </select>
          <div class="d-flex justify-content-evenly aligin-item-center m-2">
            <h5>Property Outlines</h5>
            <input type="checkbox" name="propertyOutline" id="">
            <i class="bi bi-arrow-clockwise"></i>
          </div>
          <button class="btn btn-light w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">choose user</button>
          <div class="userMapDate mt-2">
            <input class="w-100" type="datetime-local" name="" id="" placeholder="start Date">
            <input class="w-100" type="datetime-local" name="" id="end Date">
          </div>
          <div class="d-flex justify-content-evenly aligin-item-center mt-2">
            <h5>Hide Footprints</h5>
            <input type="checkbox" name="" id="">
          </div>
          <div class="usermapSpeed ">
            <h5>Playback Speed</h5>
            <input class="w-100" type="range" name="" id="">

          </div>
          <div class="d-flex">
            <button class="btn btn-primary w-100 ms-1">
              play
            </button><button class="btn btn-danger ms-1 w-100">
              restart
            </button>
          </div>
        </div>

        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51923.64306916176!2d45.31845331192017!3d35.57277150017051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40002e26c3d54d6f%3A0xab8c0997b1247330!2sAmerican%20University%20of%20Iraq%20-%20Sulaimani%20(AUIS)!5e0!3m2!1sen!2siq!4v1645645365605!5m2!1sen!2siq"
          width="100%" height="500" style="border:0;" allowfullscreen="true" loading="lazy"></iframe>

        <!-- your code here  end -->
      </div>

    </div>
  </div>
</div>

</div>