<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
    <script src="../JS/Behaviour.js"></script>
    <title>Hotelreservierung</title>
</head>
<body>
<?php
    class PersonalData
    {
        private $company;
        private $salutation;
        private $first_name;
        private $second_name;
        private $street_and_no;
        private $post_code;
        private $domicile;
        private $private_phone_number;
        private $fax;
        private $business_phone_number;
        private $mail;
        private $request_booking;

        function __construct ($company, $salutation, $first_name, $second_name, $street_and_no, $post_code,
                              $domicile, $private_phone_number, $fax, $business_phone_number, $mail, $request_booking)
        {
            $this->company = $company;
            $this->salutation = $salutation;
            $this->first_name = $first_name;
            $this->second_name = $second_name;
            $this->street_and_no = $street_and_no;
            $this->post_code = $post_code;
            $this->domicile = $domicile;
            $this->private_phone_number = $private_phone_number;
            $this->fax = $fax;
            $this->business_phone_number = $business_phone_number;
            $this->mail = $mail;
            $this->request_booking = $request_booking;
        }

        function set_company ($company)
        {
            $this->company = $company;
        }

        function get_company ()
        {
            return $this->company;
        }

        function set_salutation ($salutation)
        {
            $this->salutation = $salutation;
        }

        function get_salutation ()
        {
            return $this->salutation;
        }

        function set_first_name ($first_name)
        {
            $this->first_name = $first_name;
        }

        function get_first_name ()
        {
            return $this->first_name;
        }

        function set_second_name ($second_name)
        {
            $this->second_name = $second_name;
        }

        function get_second_name ()
        {
            return $this->second_name;
        }

        function set_street_and_no ($street_and_no)
        {
            $this->street_and_no = $street_and_no;
        }

        function get_street_and_no ()
        {
            return $this->street_and_no;
        }

        function set_post_code ($post_code)
        {
            $this->post_code = $post_code;
        }

        function get_post_code ()
        {
            return $this->post_code;
        }

        function set_domicile ($domicile)
        {
            $this->domicile = $domicile;
        }

        function get_domicile ()
        {
            return $this->domicile;
        }

        function set_private_phone_number ($private_phone_number)
        {
            $this->private_phone_number = $private_phone_number;
        }

        function get_private_phone_number ()
        {
            return $this->private_phone_number;
        }

        function set_fax ($fax)
        {
            $this->fax = $fax;
        }

        function get_fax ()
        {
            return $this->fax;
        }

        function set_business_phone_number ($business_phone_number)
        {
            $this->business_phone_number = $business_phone_number;
        }

        function get_business_phone_number ()
        {
            return $this->business_phone_number;
        }

        function set_mail ($mail)
        {
            $this->mail = $mail;
        }

        function get_mail ()
        {
            return $this->mail;
        }

        function set_request_booking ($request_booking)
        {
            $this->request_booking = $request_booking;
        }

        function get_request_booking ()
        {
            return $this->request_booking;
        }
    }

    class Room
    {
        private $amount;
        private $arrival;
        private $departure;
        private $price;

        function __construct ($amount, $arrival, $departure, $price)
        {
            $this->amount = $amount;
            $this->arrival = $arrival;
            $this->departure = $departure;
            $this->price = $price;
        }

        function set_amount ($amount)
        {
            $this->amount = $amount;
        }

        function get_amount ()
        {
            return $this->amount;
        }

        function set_arrival ($arrival)
        {
            $this->arrival = $arrival;
        }

        function get_arrival ()
        {
            return $this->arrival;
        }

        function set_departure ($departure)
        {
            $this->departure = $departure;
        }

        function get_departure ()
        {
            return $this->departure;
        }

        function get_price ()
        {
            return $this->price;
        }
    }

    class Confirmation
    {
        private $agb;
        private $remarks;

        function __construct ($agb, $remarks)
        {
            $this->agb = $agb;
            $this->remarks = $remarks;
        }

        function set_agb ($agb)
        {
            $this->agb = $agb;
        }

        function get_agb ()
        {
            return $this->agb;
        }

        function set_remarks ($remarks)
        {
            $this->remarks = $remarks;
        }

        function get_remarks ()
        {
            return $this->remarks;
        }
    }

    $data = new PersonalData("", "", "", "", "", "", "", "", "", "", "", "");
    $single_room = new Room("", "", "", "82,00");
    $double_room = new Room("", "", "", "116,00");
    $three_bed_room = new Room("", "", "", "165,00");
    $confirmation = new Confirmation("", "");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        write("\n" . "========================================" . "\n" . strtoupper("Ihre Eingaben") . "\n");

        set_reservation();
        set_single_room();
        set_double_room();
        set_three_bed_room();
        set_confirmation();
    }

    function set_reservation ()
    {
        write("\n--- Personenbezogene Daten ---" . "\n\n");

        global $data;

        if (!empty($_POST["company"]))
        {
            $data->set_company(test_input($_POST["company"]));
            write("Firma: " . $data->get_company() . "\n");
        }

        if (isset($_POST["salutation"]))
        {
            $data->set_salutation(test_input($_POST["salutation"]));
            write("Anrede: " . $data->get_salutation() . "\n");
        }

        $data->set_first_name(test_input($_POST["first-name"]));
        write("Vorname: " . $data->get_first_name() . "\n");

        $data->set_second_name(test_input($_POST["second-name"]));
        write("Name: " . $data->get_second_name() . "\n");

        $data->set_street_and_no(test_input($_POST["street-and-no"]));
        write("Straße und Nr.: " . $data->get_street_and_no() . "\n");

        $data->set_post_code(test_input($_POST["post-code"]));
        write("PLZ: " . $data->get_post_code() . "\n");

        $data->set_domicile(test_input($_POST["domicile"]));
        write("Ort: " . $data->get_domicile() . "\n");

        $data->set_private_phone_number(test_input($_POST["phone-number-private"]));
        write("Telefon privat: " . $data->get_private_phone_number() . "\n");

        if (!empty($_POST["fax"]))
        {
            $data->set_fax(test_input($_POST["fax"]));
            write("Fax: " . $data->get_fax() . "\n");
        }

        if (!empty($_POST["phone-number-business"]))
        {
            $data->set_business_phone_number(test_input($_POST["phone-number-business"]));
            write("Telefon geschäftlich: " . $data->get_business_phone_number() . "\n");
        }

        $data->set_mail(test_input($_POST["mail"]));
        write("Mail: " . $data->get_mail() . "\n");

        if (isset($_POST["request-booking"]))
        {
            $data->set_request_booking(test_input($_POST["request-booking"]));
            write("Anfrage/Buchung: " . $data->get_request_booking() . "\n");
        }
    }

    function set_single_room ()
    {
        write("\n--- Einzelzimmer ---" . "\n\n");

        global $single_room;

        if (!empty($_POST["single-room-amount"]))
        {
            $single_room->set_amount(test_input($_POST["single-room-amount"]));
            write("Anzahl Einzelzimmer: " . $single_room->get_amount() . "\n");
        }

        if (!empty($_POST["single-room-arrival"]))
        {
            $single_room->set_arrival(test_input($_POST["single-room-arrival"]));
            write("Anreisetermin: " . $single_room->get_arrival() . "\n");
        }

        if (!empty($_POST["single-room-departure"]))
        {
            $single_room->set_departure(test_input($_POST["single-room-departure"]));
            write("Abreisetermin: " . $single_room->get_departure() . "\n");
        }

        write("Einzelzimmer Preis in EUR: " . $single_room->get_price() . "\n");
    }

    function set_double_room ()
    {
        write("\n--- Doppelzimmer ---" . "\n\n");

        global $double_room;

        if (!empty($_POST["double-room-amount"]))
        {
            $double_room->set_amount(test_input($_POST["double-room-amount"]));
            write("Anzahl Doppelzimmer: " . $double_room->get_amount() . "\n");
        }

        if (!empty($_POST["double-room-arrival"]))
        {
            $double_room->set_arrival(test_input($_POST["double-room-arrival"]));
            write("Anreise: " . $double_room->get_arrival() . "\n");
        }

        if (!empty($_POST["double-room-departure"]))
        {
            $double_room->set_departure(test_input($_POST["double-room-departure"]));
            write("Abreise: " . $double_room->get_departure() . "\n");
        }

        write("Doppelzimmer Preis in EUR: " . $double_room->get_price() . "\n");
    }

    function set_three_bed_room ()
    {
        write("\n--- Dreibettzimmer ---" . "\n\n");

        global $three_bed_room;

        if (!empty($_POST["three-bed-room-amount"]))
        {
            $three_bed_room->set_amount(test_input($_POST["three-bed-room-amount"]));
            write("Anzahl Dreibettzimmer: " . $three_bed_room->get_amount() . "\n");
        }

        if (!empty($_POST["three-bed-room-arrival"]))
        {
            $three_bed_room->set_arrival(test_input($_POST["three-bed-room-arrival"]));
            write("Anreise: " . $three_bed_room->get_arrival() . "\n");
        }

        if (!empty($_POST["three-bed-room-departure"]))
        {
            $three_bed_room->set_departure(test_input($_POST["three-bed-room-departure"]));
            write("Abreise: " . $three_bed_room->get_departure() . "\n");
        }

        write("Dreibettzimmer Preis in EUR: " . $three_bed_room->get_price() . "\n");
    }

    function set_confirmation ()
    {
        write("\n--- Absenden und Bestätigen ---" . "\n\n");

        global $confirmation;

        $confirmation->set_agb(test_input($_POST["agb"]));
        write("AGB: " . $confirmation->get_agb() . "\n");

        if (!empty($_POST["remarks"]))
        {
            $confirmation->set_remarks(test_input($_POST["remarks"]));
            write("Bemerkungen: " . $confirmation->get_remarks());
        }
    }

    function test_input ($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    function write ($data)
    {
        $file = fopen("data.txt", "a") or die ("Unable to open file.");
        fwrite($file, $data);
        fclose($file);
    }
?>

<div class="title">Reservierung</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>* Pflichtfelder</p>
    <fieldset class="margin-bottom">
        <legend>Personenbezogene Daten</legend>
        <table>
            <tr>
                <td>Firma</td>
                <td><input type="text" name="company" value="<?php echo $data->get_company();?>"></td>
            </tr>
            <tr>
                <td>Anrede</td>
                <td>
                    <input type="radio" name="salutation" value="Frau" <?php $salutation = $data->get_salutation(); if (isset($salutation) && $salutation == "Frau") echo "checked";?>> Frau
                    <input type="radio" name="salutation" value="Herr" <?php $salutation = $data->get_salutation(); if (isset($salutation) && $salutation == "Herr") echo "checked";?>> Herr
                </td>
            </tr>
            <tr>
                <td>Vorname <span>*</span></td>
                <td><input type="text" name="first-name" value="<?php echo $data->get_first_name();?>" pattern="[A-Za-z]{1,}" required</td>
            </tr>
            <tr>
                <td>Name <span>*</span></td>
                <td><input type="text" name="second-name" value="<?php echo $data->get_second_name();?>" pattern="[A-Za-z]{1,}" required></td>
            </tr>
            <tr>
                <td>Straße + Nr. <span>*</span></td>
                <td><input type="text" name="street-and-no" value="<?php echo $data->get_street_and_no();?>" pattern="[A-Za-z]{1,}.?\s?[0-9]{1,3}" required></td>
            </tr>
            <tr>
                <td>PLZ <span>*</span></td>
                <td><input type="text" name="post-code" value="<?php echo $data->get_post_code();?>" pattern="[0-9]{5}" required></td>
            </tr>
            <tr>
                <td>Ort <span>*</span></td>
                <td><input type="text" name="domicile" value="<?php echo $data->get_domicile();?>" pattern="[A-Za-z]{1,}" required></td>
            </tr>
            <tr>
                <td>Telefon privat <span>*</span></td>
                <td><input type="text" name="phone-number-private" value="<?php echo $data->get_private_phone_number();?>" pattern="[0-9]{1,}" required></td>
            </tr>
            <tr>
                <td>Fax</td>
                <td><input type="text" name="fax" value="<?php echo $data->get_fax();?>"></td>
            </tr>
            <tr>
                <td>Telefon geschäftlich</td>
                <td><input type="text" name="phone-number-business" value="<?php echo $data->get_business_phone_number();?>" pattern="[0-9]{1,}"></td>
            </tr>
            <tr>
                <td>Mail <span>*</span></td>
                <td> <input type="email" name="mail" value="<?php echo $data->get_mail();?>" pattern="^(?![\.\-_])((?![\-\._][\-\._])[a-z0-9\-\._]){0,63}[a-z0-9]@(?![\-])((?!--)[a-z0-9\-]){0,63}[a-z0-9]\.(|((?![\-])((?!--)[a-z0-9\-]){0,63}[a-z0-9]\.))(|([a-z]{2,14}\.))[a-z]{2,14}$" required><td>
            </tr>
            <tr>
                <td>Anfrage/Buchung</td>
                <td>
                    <input type="radio" name="request-booking" value="Anfrage" <?php $request_booking = $data->get_request_booking(); if (isset($request_booking) && $request_booking == "Anfrage") echo "checked";?>> Anfrage
                    <input type="radio" name="request-booking" value="Buchung" <?php $request_booking = $data->get_request_booking(); if (isset($request_booking) && $request_booking == "Buchung") echo "checked";?>> Buchung
                </td>
            </tr>
        </table>
    </fieldset>

    <div class="title">Einzelzimmer</div>
    <fieldset class="margin-top margin-bottom">
        <legend>Einzelzimmer</legend>
        <table>
            <tr>
                <td>Anzahl Einzelzimmer</td>
                <td><input type="number" name="single-room-amount" min="0" max="4" value="<?php echo $single_room->get_amount();?>"></td>
            </tr>
            <tr>
                <td>Anreisetermin</td>
                <td><input type="date" name="single-room-arrival" class="arrival" value="<?php echo $single_room->get_arrival();?>"></td>
            </tr>
            <tr>
                <td>Abreisetermin</td>
                <td><input type="date" name="single-room-departure" class="departure" value="<?php echo $single_room->get_departure();?>"></td>
                <td><span class="error"></span></td>
            </tr>
            <tr>
                <td>Einzelzimmer Preis in EUR</td>
                <td><input type="text" name="single-room-price" value="<?php echo $single_room->get_price();?>" disabled></td>
            </tr>
        </table>
    </fieldset>

    <div class="title">Doppelzimmer</div>
    <fieldset class="margin-top margin-bottom">
        <legend>Doppelzimmer</legend>
        <table>
            <tr>
                <td>Anzahl Doppelzimmer</td>
                <td><input type="number" name="double-room-amount" min="0" max="4" value="<?php echo $double_room->get_amount();?>"></td>
            </tr>
            <tr>
                <td>Anreise</td>
                <td><input type="date" name="double-room-arrival" class="arrival" value="<?php echo $double_room->get_arrival();?>"></td>
            </tr>
            <tr>
                <td>Abreise</td>
                <td><input type="date" name="double-room-departure" class="departure" value="<?php echo $double_room->get_departure();?>"></td>
                <td><span class="error"></span></td>
            </tr>
            <tr>
                <td>Doppelzimmer Preis in EUR</td>
                <td><input type="text" name="double-room-price" value="<?php echo $double_room->get_price();?>" disabled></td>
            </tr>
        </table>
    </fieldset>

    <div class="title">Dreibettzimmer</div>
    <fieldset class="margin-top margin-bottom">
        <legend>Dreibettzimmer</legend>
        <table>
            <tr>
                <td>Anzahl Dreibettzimmer</td>
                <td><input type="number" name="three-bed-room-amount" min="0" max="4" value="<?php echo $three_bed_room->get_amount();?>"></td>
            </tr>
            <tr>
                <td>Anreise</td>
                <td><input type="date" name="three-bed-room-arrival" class="arrival" value="<?php echo $three_bed_room->get_arrival();?>"></td>
            </tr>
            <tr>
                <td>Abreise</td>
                <td><input type="date" name="three-bed-room-departure" class="departure" value="<?php echo $three_bed_room->get_departure();?>"></td>
                <td><span class="error"></span></td>
            </tr>
            <tr>
                <td>Dreibettzimmer Preis in EUR</td>
                <td><input type="text" name="three-bed-room-price" value="<?php echo $three_bed_room->get_price();?>" disabled></td>
            </tr>
        </table>
    </fieldset>

    <div class="title">Absenden und Bestätigen</div>
    <fieldset class="margin-top margin-bottom">
        <legend>Absenden und Bestätigen</legend>
        <table>
            <tr>
                <td>AGB bestätigen <span>*</span></td>
                <td>
                    <input type="checkbox" name="agb" value="akzeptiert" required <?php $agb = $confirmation->get_agb(); if (isset($agb) && $agb == "akzeptiert") echo "checked";?>>
                    Ja, ich habe die Allgemeinen Geschäftsbedingungen und die Datenschutzerklärung der SIWA Hotelgesellschaft mbH gelesen, verstanden und erkläre mich damit einverstanden.
                </td>
            </tr>
            <tr>
                <td>Bemerkungen</td>
                <td><textarea name="remarks" rows="10" cols="40"><?php echo $confirmation->get_remarks();?></textarea></td>
            </tr>
        </table>
    </fieldset>

    <input type="submit" id="submit" value="Absenden">
    <input type="reset" value="Löschen">
</form>
</body>
</html>