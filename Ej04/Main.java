import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import org.json.JSONObject;

public class Main {

    private static final String API_URL = "http://localhost:8004/api.php?tabla=Persona";

    public static void main(String[] args) throws Exception {
        Main main = new Main();
        System.out.println(main.callAPI());
    }

    private String callAPI() throws Exception {
        StringBuilder result = new StringBuilder();
        URL url = new URL(API_URL);
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setRequestMethod("GET");
        BufferedReader rd = new BufferedReader(new InputStreamReader(conn.getInputStream()));
        String line;
        while ((line = rd.readLine()) != null) {
            result.append(line);
        }
        rd.close();
        //return result.toString();
        if (isJSONValid(result.toString())) {
            JSONObject json = new JSONObject(result.toString());
            System.out.println(json.toString(4));
        }
        // return response;
        return "";
    }

    public boolean isJSONValid(String test) {
     
        new JSONObject(test);
        return true;
    }

}