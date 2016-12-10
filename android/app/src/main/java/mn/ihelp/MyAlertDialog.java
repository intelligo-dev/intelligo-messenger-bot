package mn.ihelp;

import android.content.Context;
import android.content.DialogInterface;

/**
 * Created by Tortuvshin Byambaa on 12/10/2016.
 */
public class MyAlertDialog {

    public void showAlertDialog(Context context, String title, String message,
                                Boolean status) {
        android.app.AlertDialog alertDialog = new android.app.AlertDialog.Builder(context).create();
        alertDialog.setTitle(title);
        alertDialog.setMessage(message);
        if(status != null)
            alertDialog.setIcon((status) ? R.drawable.success : R.drawable.fail);
        alertDialog.setButton("Тийм", new DialogInterface.OnClickListener() {
            public void onClick(DialogInterface dialog, int which) {
            }
        });
        alertDialog.show();
    }

}
