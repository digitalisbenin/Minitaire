<?php
use App\Models\User;
use App\Models\Certificate;
use App\Models\Formation;
use App\Models\Resource;
use App\Models\Chapitre;
use App\Models\Video;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DifficuleteController;
use App\Http\Controllers\DiscutionController;
use App\Http\Controllers\DiscutionReponseController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\MesCourController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuivyController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VisioConferenceController;
use App\Http\Controllers\MeetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $formation=Formation::all();
    return view('welcome',compact('formation'));
});
Route::get('/cours', function () {
    return view('cours');
});
// Route::get('/admin-cours', function () {
//     return view('admin.cours.index');
// });
Route::get('/admin-cours-detail', function () {
    return view('admin.cours.details');
});
// Route::get('/admin-create', function () {
//     return view('admin.cours.create');
// });
Route::get('/details-cours/{id}', function ($id) {
    $chapitre = Chapitre::where('formation_id',$id)->get();
    return view('details_cours',compact('chapitre'));
});
Route::get('/video', function () {
    $video= Video::all();
    return view('video',compact('video'));
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/forums', function () {
    return view('forum');
});
Route::get('/formateurs', function () {
    $formateurs=User::where('role_id',2)->get();
    return view('formateurs', compact('formateurs'));
});
Route::get('/formation', function () {
    $formation=Formation::all();
    return view('formations',compact('formation'));
});
Route::get('/documents', function () {
    $resource=Resource::all();
    return view('documents',compact('resource'));
});
Route::get('/dashboard', function () {
    $formation=Formation::all();
    $formations = Formation::orderBy('created_at', 'desc')->take(3)->get();
    $apprenants=User::where('role_id',3)->get();
    $formateurs=User::where('role_id',2)->get();
    $certificate=Certificate::all();
    return view('dashboard', compact('formation','formations','apprenants','formateurs','certificate'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/apprenants', function () {
        $apprenants=User::where('role_id',3)->get();
        return view('admin.student',compact('apprenants'));
    });
    Route::get('/admin-formateurs', function () {
        $formateurs=User::where('role_id',2)->get();
        return view('admin.formateurs',compact('formateurs'));
    });
    // Route::get('/cours', function () {
    //     return view('admin.cours');
    // });
    Route::get('/categories', function () {
        return view('admin.type');
    });
});

require __DIR__.'/auth.php';
/*-----------------Categorie--------------------------*/
Route::get('categories', [CategoryController::class, 'index']);
Route::get('create-categories', [CategoryController::class, 'create']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('categories', [CategoryController::class, 'store']);
Route::put('categories/{id}/update', [CategoryController::class, 'update']);
Route::get('categories/{id}/destroy', [CategoryController::class, 'destroy']);


/*-----------------Certificate--------------------------*/
Route::get('certificates', [CertificateController::class, 'index']);
Route::get('create-certificates', [CertificateController::class, 'create']);
Route::get('certificates/{id}', [CertificateController::class, 'show']);
Route::get('certificates/{id}', [CertificateController::class, 'edit']);
Route::post('certificates', [CertificateController::class, 'store']);
Route::put('certificates/{id}', [CertificateController::class, 'update']);
Route::get('certificates/{id}', [CertificateController::class, 'destroy']);


/*-----------------Chapitre--------------------------*/
Route::get('chapitres', [ChapitreController::class, 'index']);
Route::get('create-chapitres', [ChapitreController::class, 'create']);
Route::get('chapitres/{id}', [ChapitreController::class, 'show']);
Route::get('chapitres/{id}/edit', [ChapitreController::class, 'edit']);
Route::post('chapitres', [ChapitreController::class, 'store']);
Route::put('chapitres/{id}/update', [ChapitreController::class, 'update']);
Route::get('chapitres/{id}/destroy', [ChapitreController::class, 'destroy']);

/*-----------------Commentaire--------------------------*/
Route::get('commentaires', [CommentaireController::class, 'index']);
Route::get('create-commentaires', [CommentaireController::class, 'create']);
Route::get('commentaires/{id}', [CommentaireController::class, 'show']);
Route::get('commentaires/{id}', [CommentaireController::class, 'edit']);
Route::post('commentaires', [CommentaireController::class, 'store']);
Route::put('commentaires/{id}', [CommentaireController::class, 'update']);
Route::get('commentaires/{id}', [CommentaireController::class, 'destroy']);

/*-----------------Difficulte--------------------------*/
Route::get('difficultes', [DifficuleteController::class, 'index']);
Route::get('create-difficultes', [DifficuleteController::class, 'create']);
Route::get('difficultes/{id}/edit', [DifficuleteController::class, 'edit']);
Route::post('difficultes', [DifficuleteController::class, 'store']);
Route::put('difficultes/{id}/update', [DifficuleteController::class, 'update']);
Route::get('difficultes/{id}/destroy', [DifficuleteController::class, 'destroy']);

/*-----------------Discussion--------------------------*/
Route::get('discussions', [DiscutionController::class, 'index']);
Route::get('create-discussions', [DiscutionController::class, 'create']);
Route::get('discussions/{id}', [DiscutionController::class, 'show']);
Route::get('discussions/{id}', [DiscutionController::class, 'edit']);
Route::post('discussions', [DiscutionController::class, 'store']);
Route::put('discussions/{id}', [DiscutionController::class, 'update']);
Route::get('discussions/{id}', [DiscutionController::class, 'destroy']);

/*-----------------Meet--------------------------*/
Route::get('meets', [MeetController::class, 'index']);
Route::get('create-meets', [MeetController::class, 'create']);
Route::get('meets/{id}', [MeetController::class, 'show']);
Route::get('meets/{id}/edit', [MeetController::class, 'edit']);
Route::post('meets', [MeetController::class, 'store']);
Route::put('meets/{id}/update', [MeetController::class, 'update']);
Route::get('meets/{id}/destroy', [MeetController::class, 'destroy']);

/*-----------------Discussion Reponse--------------------------*/
Route::get('discussions-reponses', [DiscutionReponseController::class, 'index']);
Route::get('create-discussions-reponses', [DiscutionReponseController::class, 'create']);
Route::get('discussions-reponses/{id}', [DiscutionReponseController::class, 'show']);
Route::get('discussions-reponses/{id}', [DiscutionReponseController::class, 'edit']);
Route::post('discussions-reponses', [DiscutionReponseController::class, 'store']);
Route::put('discussions-reponses/{id}', [DiscutionReponseController::class, 'update']);
Route::get('discussions-reponses/{id}', [DiscutionReponseController::class, 'destroy']);

/*-----------------Visio conference--------------------------*/
Route::get('visio-conferences', [VisioConferenceController::class, 'index']);
Route::get('create-visio-conferences', [VisioConferenceController::class, 'create']);
Route::get('visio-conferences/{id}', [VisioConferenceController::class, 'show']);
Route::get('visio-conferences/{id}/edit', [VisioConferenceController::class, 'edit']);
Route::post('visio-conferences', [VisioConferenceController::class, 'store']);
Route::put('visio-conferences/{id}/update', [VisioConferenceController::class, 'update']);
Route::get('visio-conferences/{id}/destroy', [VisioConferenceController::class, 'destroy']);


/*-----------------Evaluation--------------------------*/
Route::get('evaluations', [EvaluationController::class, 'index']);
Route::get('create-evaluations', [EvaluationController::class, 'create']);
Route::get('evaluations/{id}', [EvaluationController::class, 'show']);
Route::get('evaluations/{id}', [EvaluationController::class, 'edit']);
Route::post('evaluations', [EvaluationController::class, 'store']);
Route::put('evaluations/{id}', [EvaluationController::class, 'update']);
Route::get('evaluations/{id}', [EvaluationController::class, 'destroy']);


/*-----------------Formation--------------------------*/
Route::get('formations', [FormationController::class, 'index']);
Route::get('create-formations', [FormationController::class, 'create']);
Route::get('formations/{id}', [FormationController::class, 'show']);
Route::get('formations/{id}', [FormationController::class, 'edit']);
Route::post('formations', [FormationController::class, 'store']);
Route::put('formations/{id}', [FormationController::class, 'update']);
Route::get('formations/{id}/destroy', [FormationController::class, 'destroy']);

/*-----------------Mes cours--------------------------*/
Route::get('mes-cours', [MesCourController::class, 'index']);
Route::get('create-mes-cours', [MesCourController::class, 'create']);
Route::get('mes-cours/{id}', [MesCourController::class, 'show']);
Route::get('mes-cours/{id}', [MesCourController::class, 'edit']);
Route::post('mes-cours', [MesCourController::class, 'store']);
Route::put('mes-cours/{id}', [MesCourController::class, 'update']);
Route::get('mes-cours/{id}', [MesCourController::class, 'destroy']);

/*-----------------Notification--------------------------*/
Route::get('notifications', [NotificationController::class, 'index']);
Route::get('create-notifications', [NotificationController::class, 'create']);
Route::get('notifications/{id}', [NotificationController::class, 'show']);
Route::get('notifications/{id}', [NotificationController::class, 'edit']);
Route::post('notifications', [NotificationController::class, 'store']);
Route::put('notifications/{id}', [NotificationController::class, 'update']);
Route::get('notifications/{id}', [NotificationController::class, 'destroy']);

/*-----------------Resource--------------------------*/
Route::get('ressources', [ResourceController::class, 'index']);
Route::get('create-ressources', [ResourceController::class, 'create']);
Route::get('ressources/{id}', [ResourceController::class, 'show']);
Route::get('ressources/{id}/edit', [ResourceController::class, 'edit']);
Route::post('ressources', [ResourceController::class, 'store']);
Route::put('ressources/{id}/update', [ResourceController::class, 'update']);
Route::get('ressources/{id}/destroy', [ResourceController::class, 'destroy']);

/*-----------------Role--------------------------*/
Route::get('roles', [RoleController::class, 'index']);
Route::get('create-roles', [RoleController::class, 'create']);
Route::get('roles/{id}', [RoleController::class, 'show']);
Route::get('roles/{id}', [RoleController::class, 'edit']);
Route::post('roles', [RoleController::class, 'store']);
Route::put('roles/{id}', [RoleController::class, 'update']);
Route::get('roles/{id}', [RoleController::class, 'destroy']);

/*-----------------Suivi--------------------------*/
Route::get('suivis', [SuivyController::class, 'index']);
Route::get('create-suivis', [SuivyController::class, 'create']);
Route::get('suivis/{id}', [SuivyController::class, 'show']);
Route::get('suivis/{id}', [SuivyController::class, 'edit']);
Route::post('suivis', [SuivyController::class, 'store']);
Route::put('suivis/{id}', [SuivyController::class, 'update']);
Route::get('suivis/{id}', [SuivyController::class, 'destroy']);

/*-----------------User--------------------------*/
Route::get('users', [UserController::class, 'index']);
Route::get('create-users', [UserController::class, 'create']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::get('users/{id}', [UserController::class, 'edit']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::get('users/{id}', [UserController::class, 'destroy']);

/*-----------------User categories--------------------------*/
Route::get('user-categories', [UserCategoryController::class, 'index']);
Route::get('create-user-categories', [UserCategoryController::class, 'create']);
Route::get('user-categories/{id}', [UserCategoryController::class, 'show']);
Route::get('user-categories/{id}', [UserCategoryController::class, 'edit']);
Route::post('user-categories', [UserCategoryController::class, 'store']);
Route::put('user-categories/{id}', [UserCategoryController::class, 'update']);
Route::get('user-categories/{id}', [UserCategoryController::class, 'destroy']);

/*-----------------Video--------------------------*/
Route::get('videos', [VideoController::class, 'index']);
Route::get('create-videos', [VideoController::class, 'create']);
Route::get('videos/{id}', [VideoController::class, 'show']);
Route::get('videos/{id}/edit', [VideoController::class, 'edit']);
Route::post('videos', [VideoController::class, 'store']);
Route::put('videos/{id}/update', [VideoController::class, 'update']);
Route::get('videos/{id}/destroy', [VideoController::class, 'destroy']);
