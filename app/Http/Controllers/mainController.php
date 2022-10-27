<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\user;
use Faker\Core\File;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request as request1;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use Vtiful\Kernel\Excel;
use function Composer\Autoload\includeFile;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class mainController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function Home()
    {
//        dd(asset('resources/sass/app.scss'));

        return view('partials.mainPage');
    }

    public function dashboard()
    {
        return view('dashboard/dashboard-user');
    }

    public function index()
    {
//        dd(compact('link'));
        $user = auth()->user();
        if ($user->isNormal()) {
            $link = $user->link;
        } else {
            $link = Link::query()->get();

        }
        return view('links/list', compact('link'));
//        return
    }

    public function create()
    {

        $this->authorize('create', Link::class);
        return view('links/create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Link::class);

//        $name = Storage::disk('local')->put('test', $request->linkFile);
//        $hashFileName=explode('test/',$name)[1];
//dd($name);
        if (isset($request->linkFile)) {
            $file = fopen(storage_path('app\\' . $name), 'r');
            $arr = [];
            while (!feof($file)) {

                $line = fgets($file);
//                dd($line);
                if (!empty($line)
                    && !(Str::contains("0\r\n",$line))
                ) {
                    $line[strcspn($line, "\r\n")] = 0;
//                    strtok($line,0);
//                    dd($line);
                    array_push($arr, $line);
                }
            }
//            dd($arr);
//            Storage::disk('local')->delete(Storage::path('test\\qah1B6dcf1UTJ5w9ty3vI0TIQeFBS5HjnSA7IDPx'));

        }
        foreach ($arr as $key => $value) {
            $temp = strtok($value, 0);
//            dd($temp);
            unset($arr[$key]);
            array_push($arr, $temp);
        }
        $user = auth()->user();
        array_push($arr, $request->link);
//        dd($arr);
        Link::createWithSLug($user, $arr);
        Storage::delete($name);
        return redirect()->route('links');
    }

    public function remove(Request $request)

    {
//        \Maatwebsite\Excel\Facades\Excel::download()o
//        dd($request->all());
        $link = Link::findOrFail($request->id);
        $this->authorize('delete', $link);
//        dd($link);
        $link->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $link = Link::findOrFail($id);
        $this->authorize('update', $link);
        return view('links.edit', compact('link'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
//        dd($this->authorize('update'));
//        $this->authorize('update', $request);
//        dd($request->link);
//        dd(filter_var($request->link,FILTER_VALIDATE_URL));
        $this->validate($request, ['link' => 'required|url']);
//            $valid=Validator::make($request->all(), [
//                'link' => 'url|required'
//            ]);
//            dd($valid);
        Link::query()->where('id', $request->id)->update(['link' => $request->link]);
        return redirect()->route('links');
    }

    public function changeState($id)
    {
        $link = Link::findOrFail($id);
        $this->authorize('changeState', $link);
        $link->active = !$link->active;
        $link->save();
        return redirect()->back();
    }

    public function status(Request $request)
    {
        set_time_limit(0);
        $links = array_values($request->except('_token'));
//        try {
        foreach ($links as $key => $id) {
            $dates = Link::query()->orderByDesc('status_changed')->pluck('status_changed')->first();
//            dd(!($key === 0) || (now()->diff($dates)->i === 0 && now()->diff($dates)->s < 40),$key===0,now()->diff($dates)->i);
            if (!($key === 0) || now()->diff($dates)->i === 0 && now()->diff($dates)->s < 40) {
                sleep(40);
//                    set_time_limit(60);
            }
            $link = Link::query()->findOrfail($id);
            $articleUrl = preg_split('@/@', $link->link, -1, PREG_SPLIT_NO_EMPTY);
            $arrayLength = count($articleUrl);
            $differTime = now()->diff($link->status_changed)->h;
            if (!($link->isIndex()) && $link->status_changed === null || $differTime > 2) {
                $url = 'https://www.google.com/search?q=site%3Ahttps%3A%2F%2Faradbranding.com%2F' . $articleUrl[$arrayLength - 2] . '%2F' . $articleUrl[$arrayLength - 1] . '%2F&oq=sit&aqs=chrome.1.69i59l3j69i57j0i395i433i512l2j46i131i199i395i424i433i465i466i512j0i131i395i433i512j0i395i433i512j46i395i413i424i433i512.11161j1j7&sourceid=chrome&ie=UTF-8';
                $promise = $this->handle($url);
//                    dd($promise);
                if ($promise != null) {
                    str_contains($promise, 'did not match any documents')
                        ? $link->status = Link::STATUS_NOINDEX
                        : $link->status = Link::STATUS_INDEX;
                    $link->status_changed = now();
                    $link->save();
                }
            }
        }
//        } catch (\Exception $exception) {
//            return redirect()->back()->with(['error' => $exception]);
//        }
        return redirect()->back();
    }

    private function handle($url)
    {
//        require __dir_
        $client = new Client();
//        dd($client,$url);
        try {
//            dd($url);
            $promise = $client->get($url);
//            dd($promise->getBody()->getContents());
            return \response($promise->getBody()->getContents());
//            $client->sendAsync($this->handleReq($url))->then(function ($response) {
//                dd($response);
//                 return $response->getBody()->getContents();
//                dd($response);
//             dd($response($response->getBody()));
//            });

        } catch (\Exception
//            ClientException
        $exception) {
            return $exception->getMessage();
//            dd($exception->getMessage());
//            dd($exception->getResponse()->getBody(true));
//            return $exception->getResponse()->getBody();
        }

//        dd($promise->wait());
//        return \response($promise->wait());
    }


    public function allStatus()
    {
        $link = Link::all();
        return view('links/allStatus', compact('link'));
    }

    public function check(Request $request)
    {
        dd($request->all());
    }

    private function handleReq($url)
    {
        $request = new request1('GET', $url, [
            'curl' => [
                CURLOPT_USERAGENT => 'Mozilla/5.0',
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_SSL_VERIFYHOST => '0',
                CURLOPT_SSL_VERIFYPEER => '0',
                CURLOPT_AUTOREFERER => TRUE,
                CURLINFO_HEADER_OUT => true,
                CURLOPT_FOLLOWLOCATION => '1',
                CURLOPT_VERBOSE => true,
            ],
            'proxy' => ['http' => '117.160.250.137:8080',
                'https' => '41.33.99.18:8080'],
            'User-Agent' => $_SERVER['HTTP_USER_AGENT'],
            'testing/1.0',
        ]);
//        dd($request);
        return $request;
    }
}
