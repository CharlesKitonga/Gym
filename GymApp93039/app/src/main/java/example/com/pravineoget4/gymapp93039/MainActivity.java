package example.com.pravineoget4.gymapp93039;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    EditText etFname, etLname, etEmail, etPassword;
    private String fname,lname,email,password;
    RequestQueue requestQueue;
    private static final String URL="https://evening-beach-71505.herokuapp.com/api/users/register";
    private Button btnRegister;

    private TextView to_login;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        etFname=(EditText)findViewById(R.id.fname);
        etLname=(EditText)findViewById(R.id.lname);
        etEmail=(EditText)findViewById(R.id.email);
        etPassword=(EditText)findViewById(R.id.password);
        requestQueue= Volley.newRequestQueue(MainActivity.this);
        btnRegister=(Button)findViewById(R.id.btnRegister);
        btnRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Register();
            }
        });

        to_login = (TextView) findViewById(R.id.go_to_login);
        to_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(getApplicationContext(),LoginActivity.class));
            }
        });
    }
    public void Register(){
        fname=etFname.getText().toString();
        lname=etLname.getText().toString();
        email=etEmail.getText().toString();
        password=etPassword.getText().toString();
        HashMap<String,String> params=new HashMap<String, String>();
        params.put("fname",fname);
        params.put("lname",lname);
        params.put("email",email);
        params.put("password",password);
        JsonObjectRequest jsonObjectRequest=new JsonObjectRequest(Request.Method.POST, URL, new JSONObject(params), new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                Log.d("RESPONSE",response.toString());
                try {
                    Toast.makeText(MainActivity.this,response.getString("response"),Toast.LENGTH_LONG).show();
                    Intent intent=new Intent(MainActivity.this, HomeActivity.class);
                    startActivity(intent);
                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(MainActivity.this,"An error occured",Toast.LENGTH_LONG).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> params=new HashMap<String, String>();
                params.put("fname",fname);
                params.put("lname",lname);
                params.put("email",email);
                params.put("password",password);
                return params;
            }

            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                HashMap<String,String> headers=new HashMap<String, String>();
                headers.put("Content-Type","application/json");
                return headers;
            }
        };
        requestQueue.add(jsonObjectRequest);

    }
}
