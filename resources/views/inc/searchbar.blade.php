<section class="section2">
    <div class="container">
        <form action="{{route('artist.home.index')}}">
            <div class="row row2-1">
                <!------------------------------------------------------------------------------------------------1---جستجو-->
                <div class="col">
                    <p class="signup-suggest"> نام حساب کاربری ، هشتگ اثر یا عنوان اثر مورد نظر را جستحو کنید</p>
                </div>
                <!--------------------------------------------------------------------------------------------------1-----جستجو--->
            </div><!--end row2-1-->

            <div class="row row2-2">
                <!------------------------------------------------------------------------------------------------2---جستجو-->
                <div class="col">
                    <div class="checkbox-search-parent d-flex mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="search-radio" id="check-username" value="1" checked>
                            <label class="form-check-label" for="check-username">
                                نام کاربری
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="search-radio" id="check-title" value="2">
                            <label class="form-check-label" for="check-title">
                                عنوان اثر
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="search-radio" id="check-hashtag" value="3">
                            <label class="form-check-label" for="check-hashtag">
                                هشتگ
                            </label>
                        </div>
                    </div>
                </div>
                <!---------------------------------------------------------------------------------------------------2-----جستجو-->
            </div><!--end row2-2-->

            <div class="row row2-3 justify-content-center">
                <!---------------------------------------------------------------------------------------------------جستجو فرم-->
                <div class="col-md-4 col-10 p-0">
                    <!-- Search form -->
                    <div class="md-form mt-0">
                        <input name="search" class="form-control" type="text" placeholder="جستجو کن..." aria-label="Search">
                    </div>
                </div>
                <div class="col-md-2 col-2 p-0">
                    <!-- Search btn -->
                    <div class="btn-search-parent">
                        <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <!-------------------------------------------------------------------------------------------------------جستجو فرم-->
            </div><!--end row2-3-->


        </form>

        <form action="{{route('artist.home.index')}}">
            <div class="row row3-3 justify-content-center">
                <div class="col-md-6 col-10 p-0">
                    <div class="wrapper">
                        <select class="search-category" name="categories" id="cars" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur(); this.form.submit()'>
                            <option value="">سبک اثر</option>
                            @foreach( \App\Category::get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div><!--end row3-3-->
        </form>


    </div><!--end container2-->
</section><!--end section2-->
