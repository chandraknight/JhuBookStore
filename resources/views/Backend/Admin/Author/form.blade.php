@extends('Backend.Admin.layouts.dashboard')
@section('page_heading',isset($author)?'Edit Author - '.$author->name:'Add New Author')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <form role="form" action="{{isset($author)?route('UpdateAuthor'):route('SaveAuthor')}}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf

                    <input type="hidden" name="author_id" value="{{isset($author->id)?$author->id:old('author_id')}}"/>
                    <div class="form-group">
                        <label class="control-label" for="author_name">Author Name</label>
                        <input type="text" class="form-control" id="author_name" name="author_name"
                               placeholder="Author Name"
                               value="{{isset($author->name)?$author->name:old('author_name')}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_bio">Author Bio</label>
                        <textarea class="form-control" id="author_bio"
                                  name="author_bio"> {{isset($author->bio)?$author->bio:old('author_bio')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_photo">Author Image</label>
                        <input type="file" class="form-control" id="author_photo" name="author_photo"/>
                        <img src="{{isset($author->photo)?URL::asset('storage/authors/'.$author->photo):''}}" class="img img-responsive img-thumbnail" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_email">Author Email</label>
                        <input type="email" class="form-control" id="author_email" name="author_email"
                               placeholder="Author Email"
                               value="{{isset($author->email)?$author->email:old('author_email')}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_web">Author Web</label>
                        <input type="text" class="form-control" id="author_web" name="author_web"
                               placeholder="Author Web" value="{{isset($author->web)?$author->web:old('author_web')}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_fb_link">Author Fb Link</label>
                        <input type="text" class="form-control" id="author_fb_link" name="author_fb_link"
                               placeholder="Author Fb Link"
                               value="{{isset($author->fb_link)?$author->fb_link:old('fb_link')}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_twitter_link">Author Twitter Link</label>
                        <input type="text" class="form-control" id="author_twitter_link" name="author_twitter_link"
                               placeholder="Author Twitter Link"
                               value="{{isset($author->twitter_link)?$author->twitter_link:old('fb_link')}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_insta_link">Author Insta Link</label>
                        <input type="text" class="form-control" id="author_insta_link" name="author_insta_link"
                               placeholder="Author Insta Link"
                               value="{{isset($author->insta_link)?$author->author_insta_link:old('insta_link')}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_linked_link">Author Linkedin Link</label>
                        <input type="text" class="form-control" id="author_linked_link" name="author_linked_link"
                               placeholder="Author Linked Link"
                               value="{{isset($author->linked_link)?$author->linked_link:old('linked_link')}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_youtube_link">Author Youtube Link</label>
                        <input type="text" class="form-control" id="author_youtube_link" name="author_youtube_link"
                               placeholder="Author Youtube Link"
                               value="{{isset($author->youtube_link)?$author->youtube_link:old('youtube_link')}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="author_rss_link">Author Rss Link</label>
                        <input type="text" class="form-control" id="author_rss_link" name="author_rss_link"
                               placeholder="Author RSS Link"
                               value="{{isset($author->rss_link)?$author->rss_link:old('rss_link')}}">
                    </div>
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
    </div>
@stop
