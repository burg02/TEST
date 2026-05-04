$(document).ready(function() {
    
    // signup option on change

    $("#user-type").on("change", function() {
        let div = "";

        if(this.value == "producer") {
            div += `
            <div class="mb-4">
                <p>Genre</p>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Pop" id="selectGenre">
                            <label class="form-check-label">
                            Pop
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Rock" id="selectGenre">
                            <label class="form-check-label">
                            Rock
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Jazz" id="selectGenre">
                            <label class="form-check-label">
                            Jazz
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Hip Hop" id="selectGenre">
                            <label class="form-check-label">
                            Hip Hop
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="R & B" id="selectGenre">
                            <label class="form-check-label">
                            R & B
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Heavy Metal" id="selectGenre">
                            <label class="form-check-label">
                            Heavy Metal
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Electronic" id="selectGenre">
                            <label class="form-check-label">
                            Electronic
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Classical" id="selectGenre">
                            <label class="form-check-label">
                            Classical
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Folk" id="selectGenre">
                            <label class="form-check-label">
                            Folk
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Reggae" id="selectGenre">
                            <label class="form-check-label">
                            Reggae
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mt-4 mb-5">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <p>Account Profile</p>
                            <input type="file" name="file" id="file_profile" class="">
                        </div>
                    </div>
                </div>
            </div>
            `;
        }
            $(".producer-signup").html(div);

      });

    //   apply bg to cards

    $(".all-genres .card").each(function() {
        $($(this)).css("background-color", setBG());
    });


    // dashboard small

    $(".btn-sidebar").on("click", function() {
        $(".btn-sidebar").addClass("animate");
        $(".sidebar").toggleClass("active");
        setTimeout(function() {
            $(".btn-sidebar").removeClass("animate");
        }, 1000);
    });

    //   set random bg colors

    function setBG() {
        return "#" + ("00000" + Math.floor(Math.random() * Math.pow(16, 6)).toString(16)).slice(-6);
    }



})