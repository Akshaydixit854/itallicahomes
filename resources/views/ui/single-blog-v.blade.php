<div class="wrapper">
        <div class="about-page-banner">
        <img src="{{public_path('images/post-cover-images/'.$post->cover_image)}}" width="300px" height="300px">
        </div>

    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="inner-blog-heading">
                    @if(\Lang::has('blog.blog_title_'.$post->id))
                        {!! (new \App\Services\PropertyService)->truncate(trans('blog.blog_title_'.$post->id),250) !!}
                    @else
                        {!!  $post->title !!}
                    @endif
                </span>
                <ul class="blog-share-section1 row">
                    <li class="col-md-6 col-6">
                        <a href="javascript:void(0)" class="calendar">&#xf073;</a>
                        <span>{{date('d-m-Y',strtotime($post->created_at))}}</span>
                    </li>
                    
                </ul>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-blog-content">
                                @if(\Lang::has('blog.blog_description_'.$post->id))
                                    {!! trans('blog.blog_description_'.$post->id) !!}
                                @else
                                    {!! $post->content !!}
                                @endif
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="demo">
                              <ul id="lightSlider">
                                  @if(!$gallery_images->isEmpty())
                                      @foreach($gallery_images as $gallery_image)
                                          <li data-thumb="{{public_path("/images/cover-images/".$gallery_image->image)}}">
                                              <img src="{{public_path("/images/cover-images/".$gallery_image->image)}}"/ class="gallery-img">
                                          </li>
                                      @endforeach
                                 @endif
                              </ul>
                          </div>
                        </div> -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>