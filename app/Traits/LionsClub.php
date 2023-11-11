<?php

namespace App\Traits;

use App\Jobs\RegisterNewUserToBot;
use App\Models\VisitorRiskAssessment;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



trait LionsClub
{

    public function lions_club_home()
    {
        return view("dashboard.risk-assessment.lions.index");
    }

    public function lions_start(Request $request)
    {

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'whatsapp_contact' => 'required|string|max:255',
            // If you want to validate the hidden fields as well, you can include them here.
            'start_qs_1' => 'required|in:no',
            'start_qs_2' => 'required|in:no'
        ]);

        $start_qs_1 = $request->input("start_qs_1");
        $start_qs_2 = $request->input("start_qs_2");

        $full_name = $request->input("full_name");
        $whatsapp_contact = $request->input("whatsapp_contact");
        $whatsapp_contact = str_replace("+", "", $whatsapp_contact);
        Session::put("have_hypertension", $start_qs_1);
        Session::put("have_diabetes", $start_qs_2);

        Session::put("full_name", $full_name);
        Session::put("whatsapp_contact", $whatsapp_contact);

        if ($start_qs_1 == "no" && $start_qs_2 == "no") {
            // ACTION: SCREEN FOR RISK OF DEVELOPING TYPE 2 DIABETES
            return redirect()->to("lions-club/risk-assessment/type-2-diabetes");
        } else {
            return abort(404, "something went wrong");
        }
    }


    public function save_assessment_entry_visitor(array $data)
    {
        $existing_data = VisitorRiskAssessment::where('wa_phone', Session::get("whatsapp_contact"))->exists();
        if ($existing_data) {
            return true;
        }
        $risk_model = new VisitorRiskAssessment();

        $risk_model->name = Session::get("full_name");
        $risk_model->wa_phone = Session::get("whatsapp_contact");
        $risk_model->by_tenant_id = 1;
        $risk_model->have_hypertension = session()->get("have_hypertension");
        $risk_model->have_diabetes = session()->get("have_diabetes");
        $risk_model->gender = $data['gender'] ?? "NA";
        $risk_model->age = $data['age'] ?? "NA";
        $risk_model->weight = $data['weight'] ?? "NA";
        $risk_model->height = $data['height'] ?? "NA";
        $risk_model->treating_hbp = $data['treating_hbp'] ?? "NA";
        $risk_model->systolic_bp = $data['systolic_bp'] ?? "NA";
        $risk_model->smoking = $data['smoking'] ?? "NA";
        $risk_model->fam_cvd = $data['fam_cvd'] ?? "NA";
        $risk_model->waistline = $data['waistline'] ?? "NA";
        $risk_model->exercise = $data['exercise'] ?? "NA";
        $risk_model->eat_vegie = $data['eat_vegie'] ?? "NA";
        $risk_model->treated_sugar_hbp = $data['treated_sugar_hbp'] ?? "NA";
        $risk_model->fam_diabetes = $data['fam_diabetes'] ?? "NA";
        $risk_model->save();
    }

    public function lions_scenario_one(Request $request, $skip_view = false)
    {
        $data = $this->scenario_one($request, true, false);
        $risk_score = $data['risk_score'];
        $risk_implication = $data['risk_implication'];
        $data['recommendation_link'] = "https://wa.me/2348090217775?text=hi";
        $data['risk_recommendation'] = "Get started with our chatbot and learn more about diabetes!";
        $recommendation_link = $data['recommendation_link'];
        $risk_recommendation = $data['risk_recommendation'];
        $this->save_assessment_entry_visitor($data['data']);
        $bot_sub_data = ["name"=>Session::get("full_name"),"phone"=>Session::get("whatsapp_contact"),"bot_type"=>"diabetes"];
        // RegisterNewUserToBot::dispatch($bot_sub_data);
        $this->sendPostRequest( $bot_sub_data);

        return view('dashboard.risk-assessment.lions.results', compact("risk_score", "risk_implication", "recommendation_link", "risk_recommendation"));
    }

    public function sendPostRequest($data)
    {
        $response = Http::post('https://wa-botapp.viedial.ca/api/subscribe-user/diabetes', $data);        
    }

    public function admin_page()
    {
        if(!Session::get("lion_admin"))
        {
            return abort(401);
        }
        $data = VisitorRiskAssessment::where("by_tenant_id",1)->paginate(20);

        return view("dashboard.risk-assessment.lions.admin",compact("data"));

    }
}
