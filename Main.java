
import java.math.BigDecimal;
import java.math.RoundingMode;
import java.util.Locale;

public class Main{
    public static void main(String[] args) {
        double a = 5;
        double b = 4;
        double c = 2;
        double d = (a + b)/c;
        System.out.println(d);

        double e = 19;
        double f = 23;
        double g = 8;
        double h = (e + f)/g;
        System.out.println(h);

        double max = Double.MAX_VALUE;
        double min = Double.MIN_VALUE;
        System.out.println("El rango de double es "+min+ " a "+max);

        double tercero = 1.0 / 3.0;
        System.out.println(tercero);

        float maxFloat = Float.MAX_VALUE;
        float minFloat = Float.MIN_VALUE;
        System.out.println("El rango de float es de "+minFloat+ " a "+maxFloat);

        //double
        a = 1.0;
        b = 3.0;
        System.out.println(a/b);
        
        float i = 1.0F;
        float j = 3.0F;
        System.out.println(i/j);

        BigDecimal precio = new BigDecimal("19.99");

        System.out.println(precio);

        String.format("%.2f", a); // Muestra 2 decimales
        System.out.printf("%.2f", b);
        System.out.println();
        double numero = 1234567.89;
        String formatoUS = String.format(Locale.US, "%,.2f", numero);
        System.out.println("String.format (US): " + formatoUS); // Salida: 1,234,567.8
        BigDecimal bd = new BigDecimal(Double.toString(numero));
        bd = bd.setScale(4, RoundingMode.DOWN);
        double resultado = bd.doubleValue();
        System.out.println("Resultado truncado: "+resultado);


    
    }
}