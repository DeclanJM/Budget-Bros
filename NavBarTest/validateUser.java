package NavBarTest;

import java.util.ArrayList;
import java.io.*;

import NavBarTest.CsvReader;
import NavBarTest.User;

public class validateUser {

    public static ArrayList<User> csvHandler(String filename, String delimiter) {
        CsvReader csvReader = new CsvReader(filename, delimiter);
        try {
            ArrayList<User> userList = csvReader.readUsersFromCsv();
            return userList;

        } catch (IOException e) {
            System.err.println(e);
            return null;
        }
    }

    public static boolean validNewUser(User newGuy, ArrayList<User> currentUserList) {
        for(int i = 0; i < currentUserList.size(); i++) {
            if(currentUserList.get(i).getName() != newGuy.getName()) {
                if(currentUserList.get(i).getEmail() != newGuy.getEmail()) {
                    return true;
                }
            }
        }
        return false;
    }

    public static void main(String[] args) {
        ArrayList<User> newUserList = csvHandler("NewUser.csv", ",");
        ArrayList<User> currentUserList = csvHandler("currentUserList.csv", ",");

        NavBarTest.User newGuy = newUserList.get(0);

        boolean heIsValid = validNewUser(newGuy, currentUserList);

        if(heIsValid) {
            //Add him to current users
            currentUserList.add(newGuy);
        }
        else {
            //Do something else
        }

    }
}
