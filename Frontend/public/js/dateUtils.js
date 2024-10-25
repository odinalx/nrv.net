export class DateUtils {
    static sortByDate(spectacles) {
        return spectacles.sort((a, b) => {
            const [dayA, monthA, yearA] = a.date.split('-');
            const [dayB, monthB, yearB] = b.date.split('-');
            const dateA = new Date(`${yearA}-${monthA}-${dayA}`);
            const dateB = new Date(`${yearB}-${monthB}-${dayB}`);
            return dateA - dateB;
        });
    }

    static getAvailableDates(spectacles) {
        return [...new Set(spectacles.map(s => s.date))].sort((a, b) => {
            const [dayA, monthA, yearA] = a.split('-');
            const [dayB, monthB, yearB] = b.split('-');
            const dateA = new Date(`${yearA}-${monthA}-${dayA}`);
            const dateB = new Date(`${yearB}-${monthB}-${dayB}`);
            return dateA - dateB;
        });
    }
}
