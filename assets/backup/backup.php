<?php
manage("INSERT INTO agents(agent_name,agent_active_employee,agent_current_tier,agent_dob,agent_campaign,agent_manager,agent_training_date,agent_adp_date,agent_tier1_date,agent_tier2_date,agent_tier3_date,agent_tier4_date,agent_termination_reason,agent_termination_date,agent_contact_number,agent_sss,agent_phic,agent_hmdf,agent_tin,agent_emergency_contact_person,agent_emergency_contact_number,agent_date_created) 
		VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($_POST['agent_name'],$_POST['agent_active'],$_POST['agent_current_tier'],
			$_POST['agent_dob'],$_POST['agent_campaign'],$_POST['agent_manager'],$_POST['agent_training_date'],$_POST['agent_adp_date'],
			$_POST['agent_tier1_date'],$_POST['agent_tier2_date'],$_POST['agent_tier3_date'],$_POST['agent_tier4_date'],
			$_POST['agent_termination_reason'],$_POST['agent_termination_date'],$_POST['agent_contact_number'],
			$_POST['agent_sss'],$_POST['agent_phic'],$_POST['agent_hmdf'],$_POST['agent_tin'],
			$_POST['agent_emergency_contact_person'],$_POST['agent_emergency_contact_number'],date("Y-m-d")));
		echo "<script>
			alert('Encoded Agent Successfully');
		</script>";

,Training Date,ADP Date,Tier 1 Date,Tier 2 Date,Tier 3 Date,Tier 4 Date,SSS,PHIC,HMDF,TIN,Termination Reason,Termination Date,Emergency Contact Person,Emergency Contact Number,Date Added,Action

echo "<td>".date("F d, Y",strtotime($agent_row['agent_training_date']))."</td>";
echo "<td>".($agent_row['agent_adp_date']==""?"":date("F d, Y",strtotime($agent_row['agent_adp_date'])))."</td>";
echo "<td>".($agent_row['agent_tier1_date']==""?"":date("F d, Y",strtotime($agent_row['agent_tier1_date'])))."</td>";
echo "<td>".($agent_row['agent_tier2_date']==""?"":date("F d, Y",strtotime($agent_row['agent_tier2_date'])))."</td>";
echo "<td>".($agent_row['agent_tier3_date']==""?"":date("F d, Y",strtotime($agent_row['agent_tier3_date'])))."</td>";
echo "<td>".($agent_row['agent_tier4_date']==""?"":date("F d, Y",strtotime($agent_row['agent_tier4_date'])))."</td>";
echo "<td>".$agent_row['agent_sss']."</td>";
echo "<td>".$agent_row['agent_phic']."</td>";
echo "<td>".$agent_row['agent_hmdf']."</td>";
echo "<td>".$agent_row['agent_tin']."</td>";
echo "<td>".$agent_row['agent_termination_reason']."</td>";
echo "<td>".($agent_row['agent_termination_date']==""?"":date("F d, Y",strtotime($agent_row['agent_termination_date'])))."</td>";
echo "<td>".$agent_row['agent_emergency_contact_person']."</td>";
echo "<td>".$agent_row['agent_emergency_contact_number']."</td>";
echo "<td>".date("F d, Y",strtotime($agent_row['agent_date_created']))."</td>";


if (isset($_POST['add_headset_tracker'])) {
		
		manage("INSERT INTO headset_tracker(headsetID,locID,pad_number) VALUES(?,?,?)",
			array($_POST['headset_tracker_name'],$_POST['headset_location'],$_POST['pad_number']));
		manage("UPDATE headsets SET headset_assigned_status=? WHERE headsetID=?",array(1,$_POST['headset_tracker_name']));
		$new_headset_tracker_info=retrieve("SELECT * FROM headset_tracker 
				LEFT JOIN site_location ON headset_tracker.locID=site_location.locID 
				LEFT JOIN headsets ON headset_tracker.headsetID=headsets.headsetID",array());
		manage("INSERT INTO inventory_logs(inventory_user_id, inventory_type, inventory_action, inventory_details, inventory_date) VALUES(?,?,?,?,?)",array($_SESSION['user_id'], "Headset","Assign Headset","<details>
						<summary>Assigned Headset</summary>
						<p>
							Headset Name: ".$new_headset_tracker_info[0]['headset_name']."<br>
							Location: ".$new_headset_tracker_info[0]['locSite']."<br>
							Pad Number: ".$_POST['pad_number']."<br>
							Headset Assigned: Yes
						</p>
						
			</details>",date("Y-m-d h:i:s A")));
		echo "<script type='module'>
			Swal.fire('Good Job','Added Headsets in tracker successfully','success');
		</script>";
	}

if (COUNT($track_system_unit) == COUNT($track_keyboard) == COUNT($track_monitor) == COUNT($track_mouse) == COUNT($track_avr) == COUNT($track_ssd) == COUNT($track_ram)) {
			
		}

		for ($su=0;$su<COUNT($track_system_unit);$su++) { 

			// manage("INSERT INTO computer_tracker(locID,system_unit_id,computer_pad_number) VALUES(?,?,?)",
			// 	array($_POST['computer_location'],$track_system_unit[$su],$_POST['computer_pad_number']));

			manage("INSERT INTO computer_tracker(locID,system_unit_id,keyboard_id,monitor_id,mouse_id,avr_id,ssd_id,ram_id,computer_pad_number) VALUES(?,?,?,?,?,?,?,?,?)",array($_POST['computer_location'],$track_system_unit[$su],$_POST['computer_tracker_keyboard'],$_POST['computer_tracker_monitor'],$_POST['computer_tracker_mouse'],
				$_POST['computer_tracker_avr'],$_POST['computer_tracker_ssd'],$_POST['computer_tracker_ram'],
				$_POST['computer_pad_number']));
		}

		manage("INSERT INTO computer_tracker(locID,system_unit_id,keyboard_id,monitor_id,mouse_id,avr_id,ssd_id,ram_id,computer_pad_number) VALUES(?,?,?,?,?,?,?,?,?)",array($_POST['computer_location'],$_POST['computer_tracker_system_unit'],$_POST['computer_tracker_keyboard'],$_POST['computer_tracker_monitor'],$_POST['computer_tracker_mouse'],
				$_POST['computer_tracker_avr'],$_POST['computer_tracker_ssd'],$_POST['computer_tracker_ram'],
				$_POST['computer_pad_number']));
		
		for updating assigned computer pheripherals
		$insert_comp_parts_array=array("system_unit","monitor","keyboard","mouse","avr","ram","ssd");
		for ($j=0;$j<COUNT($insert_comp_parts_array);$j++) { 
			manage("UPDATE ".$insert_comp_parts_array[$j]." SET ".$insert_comp_parts_array[$j]."_assigned_status=? WHERE ".$insert_comp_parts_array[$j]."_ID=?",
				array(1,$_POST['computer_tracker_'.$insert_comp_parts_array[$j]]));
		}
?>