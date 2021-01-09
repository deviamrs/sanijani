<?php

namespace App\Http\Controllers;


use App\Model\About;
use App\Model\Category;
use App\Model\Location;
use App\Model\Page;
use App\Model\Post;
use App\Model\Service;
use App\Model\Setting;
use App\Model\Tag;
use App\Model\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\Mail\ResponseFromWebsite;
use Illuminate\Support\Str;

class FrontController extends Controller
{
  //

  public function index()
  {

    // $practiceAreas = PracticeArea::where('status' , 1)->get();   
    $aboutData = About::where('status', 1)->where('id', 1)->first();
    $services = Service::where('status', 1)->where('status_front', 1)->get();
    $locations = Location::where('status', 1)->where('status_front', 1)->get();
    $testimonials = Testimonial::where('status', 1)->where('featured', 1)->get();
    $contactData = Setting::first();
     $pagname = Page::findOrFail(1);
    $insights =  Post::orderBy('publish_date', 'desc')->where('publish', 1)->where('featured', 1)->get();

    return view('front.index')
      // ->withPracticeAreas($practiceAreas)
      ->withContactData($contactData)
      ->withAboutData($aboutData)
      ->withServices($services)
      ->withTestimonials($testimonials)
      ->withPagename($pagname)
      ->withLocations($locations);
  }
  public function about()
  {

    $abouts = About::where('status', '1')->get();
    $pagname = Page::findOrFail(2);
    return view('front.about')->withAbouts($abouts)->withPagename($pagname);;
  }
  // public function faq($slug){ 

  //     $faqcategory = FaqCategory::where('slug' , $slug)->first();

  //     $faqs = Faq::where('status' , 1)->where('faq_category_id' , $faqcategory->id)->get();

  //     return view('front.faq')->withFaqcategory($faqcategory)->withFaqs($faqs);}




  public function insight()
  {
    $pagname = Page::findOrFail(5);
    $posts =  Post::orderBy('publish_date', 'desc')->where('publish_date', '!=', null)->where('publish', 1)->paginate(15);
    return view('front.insight')->withPagename($pagname)->withPosts($posts);
  }
  // public function other($slug){

  //     $other = Other::where('slug' , $slug)->first();

  //     return view('front.other')->withOther($other);
  // }
  public function testimonials()
  {
    $pagname = Page::findOrFail(5);
    $testimonials = Testimonial::where('status', 1)->get();
    return view('front.testimonial')->withPagename($pagname)->withTestimonials($testimonials);
  }
  public function contact()
  {

    $pagname = Page::findOrFail(6);
    $contactData = Setting::first();

    return view('front.contact')->withContactData($contactData)->withPagename($pagname);
  }



  public function getsinglepost($slug)
  {

    $post = Post::where('slug', $slug)->first();

    if ($post != null) {

      $superid = $post->category->id;
      $id = $post->id;

      $featuredposts =  Post::inRandomOrder()->orderBy('publish_date', 'desc')->where('category_id', '!=', $superid)->where('publish', 1)->where('featured', '!=', 1)->where('publish_date', '!=', null)->where('id', '!=', $id)->take(10)->get();

      return view('front.singleinsight')->withPost($post)->withFeaturedposts($featuredposts);
    } else {

      $message = 'Sorry The page you looking for is not available , either it may be removed or not even created yet';

      return view('inc_front.404')->withMessage($message);
    }
  }



  public function searchallpost()
  {

    $titleOrg = $_GET['title'];

    $title =  Str::slug($titleOrg, '-');

    $posts = Post::where('slug', 'LIKE', '%' . $title . '%')->orderBy('publish_date', 'desc')->where('publish', 1)->where('publish_date', '!=', null)->paginate(15);

    $pagname = Page::findOrFail(5);

    if ($posts->count() == 0) {

      $incategory =  Category::where('slug', 'LIKE', '%' . $title . '%')->first();

      if ($incategory != null) {


        $incategoryposts =  Category::findOrFail($incategory->id)->posts()->orderBy('publish_date', 'desc')->where('publish_date', '!=', null)->where('publish', 1)->paginate(15);

        return view('front.searchall')->withPosts($incategoryposts)->withTitle($titleOrg);
      } else {
        if ($incategory == null) {

          $intag = Tag::where('slug', 'LIKE', '%' . $title . '%')->first();

          if ($intag != null) {
            $intagposts = Tag::findOrFail($intag->id)->posts()->orderBy('publish_date', 'desc')->where('publish', 1)->paginate(15);

            return view('front.searchall')->withPosts($intagposts)->withTitle($titleOrg);
          }
        }
      }
    }
    return view('front.insight')->withPosts($posts)->withTitle($titleOrg)->withPagename($pagname);
  }

  public function getpostbytag($tag)
  {

    $pagname = Page::findOrFail(5);
    $tagid = Tag::where('slug', $tag)->first();

    $posts = Tag::findOrFail($tagid->id)->posts()->orderBy('publish_date', 'desc')->where('publish_date', '!=', null)->where('publish', 1)->paginate(15);


    return view('front.insight')->withPosts($posts)->withTagname($tag)->withPagename($pagname);
  }

  public function getpostbycategory($slug)
  {

    $catid =  Category::where('slug', $slug)->first();
    $pagname = Page::findOrFail(5);
    $posts = Category::findOrFail($catid->id)->posts()->orderBy('publish_date', 'desc')->where('publish_date', '!=', null)->where('publish', 1)->paginate(15);

    return view('front.insight')->withPosts($posts)->withSupername($catid->name)->withPagename($pagname);
  }
  public function service($slug)
  {
    $service = Service::where('slug', $slug)->where('status', 1)->first();

    return view('front.service')->withService($service);
  }

  public function locationlist()
  {
    $pagname = Page::findOrFail(3);
    return view('front.locationlist')->withLocations(Location::where('status', 1)->get())->withPagename($pagname);;
  }

  public function location($slug)
  {
    $location = Location::where('slug', $slug)->where('status', 1)->first();
    $contactData = Setting::first();
    return view('front.location')->withLocation($location)->withContactData($contactData);
  }


  public function submit_contact_form(Request $request)
  {

    $request->validate([

      'name' => 'required|max:25',
      'email' => 'required|email',
      'subject' => 'required|min:10',
      'message' => 'required',

    ]);


    $data = [

      'name' => $request->name,
      'email' => $request->email,
      'subject' => $request->subject,
      'message' => $request->message,
    ];




    Mail::to($request->email)->send(new ContactEmail($data));
    Mail::to('Sanijaniservices1@gmail.com')->send(new ResponseFromWebsite($data));

    return redirect()->back()->with('success', 'Your Form has been Submitted   Successfully <br>  Thank you for reaching us ');
  }
}
