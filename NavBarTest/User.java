import java.io.IOException;
import java.util.List;

public class User {
    private String name;;
    private String email;
    private String password;

    public User() {
        // Default constructor
    }

    public User(String name, String email, String password) {
        this.name = name;
        this.email = email;
        this.password = password;
    }

    // Getters
    public String getName() {
        return this.name;
    }

    public String getEmail() {
        return this.email;
    }

    public String getPassword() {
        return this.password;
    }

    // Setters
    public void setName(String name) {
        this.name = name;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String toString(){
        String s = "";

        s += "\n";
        s += "User: " + name;
        s += "\nEmail: " + email;
        s += "\nHashed Password: " + password;
        s += "\n ";

        return s;
    }

    public void testUser() {
        User dec = new User("Declan M", "decjmclaughlin@gmail.com", "h3bwyutvwyiedw3q2rtwgs");
        CsvReader reader = new CsvReader("Users.csv", ",");
        try {
            List<User> users = reader.readUsersFromCsv();
            System.out.println(users.get(0).getName());
        } catch (IOException e) {
            e.printStackTrace();
            }
    }
public static void main(String[] args) {
    //testUser();

    }
}
