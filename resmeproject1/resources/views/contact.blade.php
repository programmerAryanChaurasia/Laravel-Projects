<x-layout>
    <x-slot name="title">Contact</x-slot>
    <x-slot name="content">
        <div class="container mt-5">
            <h1 class="text-warning mb-5 border-bottom">CONTACT US</h1>
            <div class="row text-white mb-5">
                <p class="mx-auto mb-5">
                    Do you have any question? Please do not hesitate to contact. I will come back to you within a matter of hours to help you.
                </p>
                <div class="col-sm-9 mb-5">
                    <form action="">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inputName">Your Name</label>
                                <input type="text" class="form-control mt-2" id="inputName"/>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail">Your Email *</label>
                                <input type="email" class="form-control mt-2" id="inputEmail" required/>
                            </div>
                            <div class="col-md-12">
                                <label for="inputSubject">Your Subject</label>
                                <input type="text" class="form-control mt-2" id="inputSubject"/>
                            </div>
                            <div class="col-md-12">
                                <label for="inputTextarea">Your Message *</label>
                                <textarea type="text" class="form-control mt-2" id="inputTextarea" required> 
                                </textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">Send</button>
                    </form>
                </div>
                <div class="col-sm-3 text-center">
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa-solid fa-location-dot fa-2x i-color"></i>
                            <p>GOrakhpur, Utter Pradesh,India</p>
                        </li>
                        <li>
                            <i class="fa-sharp fa-solid fa-phone fa-2x i-color"></i>
                            <p>+91 9889000000</p>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope fa-2x i-color"></i>
                            <p>contact@gmail.com</p>
                        </li>
                    </ul>
                </div>
            </div>            
        </div>
        <div class="text-center">
            <a href="#" target="_blank"><i class="fa-brands fa-twitter fa-2x i-color"></i></a>
            <a href="#" target="_blank"><i class="fa-brands fa-facebook-f fa-2x i-color mx-3"></i></a>
            <a href="#" target="_blank"><i class="fa-brands fa-instagram fa-2x i-color"></i></a>
            <a href="#" target="_blank"><i class="fa-brands fa-dribbble fa-2x i-color mx-3"></i></i></a>
        </div>
    </x-slot>
</x-layout>