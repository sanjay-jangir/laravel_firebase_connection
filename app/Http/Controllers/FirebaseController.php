<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Google\Cloud\Storage\StorageClient;


class FirebaseController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $serviceAccount = ServiceAccount::fromJsonFile( storage_path( 'app/firebase/cloud-firestore-test-f3c2c-firebase-adminsdk-5t41z-9a7dc2091c.json' ) );
        $firebase = ( new Factory )
        ->withServiceAccount( $serviceAccount )
        ->withDatabaseUri( 'https://supndine-andriod-app-default-rtdb.firebaseio.com/' )
        ->create();
        $database = $firebase->getDatabase();
        $newPost = $database
        ->getReference( 'blog/posts' );

        // Authenticate using a keyfile path
        $cloud = new StorageClient([
            'keyFilePath' => storage_path( 'app/firebase/cloud-firestore-test-f3c2c-firebase-adminsdk-5t41z-9a7dc2091c.json' )
        ]);

        $bucket = $cloud->bucket('users')->getvalue();
        dd($bucket);

       /* ->push( [
            'title' => 'Post title',
            'body' => 'This should probably be longer.'
        ] );*/

        // dd( $newPost->getKey() );
        //$newPost->getKey();
        // => -KVr5eu8gcTv7_AHb-3-
        //$newPost->getUri();
        // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
        //$newPost->getChild( 'title' )->set( 'Changed post title' );
        //$newPost->getValue();
        // Fetches the data from the realtime database
        //$newPost->remove();

        echo'<pre>';
        echo $newPost->getUri();
        print_r( $newPost->getvalue() );

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
    }
}
