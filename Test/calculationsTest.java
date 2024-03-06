package Test;

import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.BeforeEach;
import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.ArrayList;

import Model.Calculations;


public class calculationsTest {
    //Tests go in here, make sure to download JUnit for testing and enable it

    private Calculations calc;
    @BeforeEach
    public void createCalculations() {
        calc = new Calculations();
    }


    @Test
    void testGetTotal() {
        assertEquals(0, calc.getTotal());

        calc = new Calculations(22);

        assertEquals(22, calc.getTotal());
    }


    @Test
    void testSetTotal() {
        calc.setTotal(45);

        assertEquals(45, calc.getTotal());
    }


    @Test
    void testCalcTotal() {
        ArrayList<Double> doubleList = new ArrayList<>();
        doubleList.add(15.5);
        doubleList.add(12.0);
        doubleList.add(4.3);

        assertEquals(31.8, calc.CalcTotal(doubleList));
    }
}
