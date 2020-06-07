
class IPCalculate
{
    static calcualteSum(_class) {
        let sum = 0;

        $(_class).each(function (index, element) {
            sum += parseFloat($(element).val());
        });

        if (isNaN(sum)) {
            return 0;
        } else {
            return sum;
        }
    }
}
