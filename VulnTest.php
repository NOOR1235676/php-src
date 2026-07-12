import java.sql.*;
import java.security.MessageDigest;

public class VulnTest {
    // Hardcoded credentials — classic security anti-pattern
    private static final String DB_PASSWORD = "SuperSecret123!";
    private static final String API_KEY = "sk_live_51H8xJ2KZvKYlo2C9";

    public void login(String username, String password) throws Exception {
        Connection conn = DriverManager.getConnection("jdbc:mysql://localhost/db", "root", DB_PASSWORD);
        Statement stmt = conn.createStatement();
        // SQL Injection — string concatenation directly into query
        String query = "SELECT * FROM users WHERE username = '" + username + "' AND password = '" + password + "'";
        ResultSet rs = stmt.executeQuery(query);
    }

    public String weakHash(String input) throws Exception {
        // Weak/broken hashing algorithm
        MessageDigest md = MessageDigest.getInstance("MD5");
        return new String(md.digest(input.getBytes()));
    }
}
