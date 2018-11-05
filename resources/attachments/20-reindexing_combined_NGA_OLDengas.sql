---------------------------------------------------------
--This will reindex all table major tables and clear all temporary JEV
---------------------------------------------------------

DBCC DBREINDEX ( BK_R_PPE_118 )
go

DBCC DBREINDEX ( BK_T_TRANSACTION_131 )
go

DBCC DBREINDEX ( BK_T_TRANSACTION_DETAIL_132 )
go

DBCC DBREINDEX ( BK_T_TRANSACTION_SUBSIDIARY_133 )
go

DBCC DBREINDEX ( BK_T_ARDEBITS_142 )
go

DBCC DBREINDEX ( BK_T_APCREDITS_143 )
go

DBCC DBREINDEX ( BK_T_ISPPE_145 )
go

Delete BK_T_TRANSACTION_REFERENCE_134
where transaction_no < 0 

Delete BK_T_TRANSACTION_REVIEWED_135
where transaction_no < 0 
  
Delete BK_T_TRANSACTION_REFERENCE_DETAILS  
where transaction_no < 0  
  
Delete BK_T_CIP_147  
where transaction_no < 0  
  
Delete BK_T_TRANSACTION_SUBSIDIARY_133  
where transaction_no < 0  
  
Delete BK_T_ISPPE_145  
where tran_no < 0  
  
Delete BK_T_PublicInfra  
where tran_no < 0  
  
Delete BK_T_APCREDITS_143  
where transaction_no < 0  
  
Delete BK_T_ARDEBITS_142  
where transaction_no < 0    

Delete BK_T_TRANSACTION_DETAIL_132  
where transaction_no < 0  
  
Delete BK_T_Transaction_131  
where transaction_no < 0

--UPDATED BY DNG 070617
delete from dbo.BK_T_APCREDITS_143_TEMP
delete from dbo.BK_T_ARDEBITS_142_TEMP
delete from dbo.BK_T_CIP_147_TEMP
delete from dbo.BK_T_ISPPE_145_TEMP
delete from dbo.BK_T_ISINTANGIBLE_TEMP
delete from dbo.BK_T_PublicInfra_TEMP
delete from dbo.BK_T_TRANSACTION_REVIEWED_135_TEMP
delete from dbo.BK_T_TRANSACTION_REFERENCE_134_TEMP
delete from dbo.BK_T_TRANSACTION_SUBSIDIARY_133_TEMP
delete from dbo.BK_T_TRANSACTION_DETAIL_132_TEMP
delete from dbo.BK_T_TRANSACTION_131_TEMP
delete from dbo.BK_T_TRANSACTION_SUBSIDIARY_RPU_TEMP
delete from BK_TMP_PAYABLES_001
delete from BK_TMP_PAYABLES_002
delete from BK_TMP_PAYABLES_003
delete from BK_TMP_PAYABLES_005
delete from BK_TMP_PAYABLES_006
delete from BK_TMP_PAYABLES_007
delete from BK_TMP_PAYABLES_008
delete from dbo.BK_TMP_AGING_002
delete from dbo.BK_TMP_AGING_003
delete from dbo.BK_TMP_AGING_004
delete from dbo.BK_TMP_AGING_005
delete from dbo.BK_TMP_AGING_006
delete from dbo.BK_TMP_AGING_007
delete from dbo.BK_TMP_AGING_008
delete from dbo.BK_TMP_CASH_FLOW_001
delete from dbo.BK_TMP_CASH_FLOW_002
delete from dbo.BK_TMP_CASH_FLOW_003
delete from dbo.BK_TMP_CASH_FLOW_004
GO